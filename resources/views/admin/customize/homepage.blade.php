@extends('admin.layout.layout')

@section('container')
<style>
    input.toggle-switch[type=checkbox]{
        height: 0;
        width: 0;
        visibility: hidden;
    }

    input.toggle-switch + label {
        cursor: pointer;
        text-indent: -9999px;
        width: 50px;
        height: 30px;
        background: grey;
        display: block;
        border-radius: 100px;
        position: relative;
    }

    input.toggle-switch + label:after {
        content: '';
        position: absolute;
        top: 1px;
        left: 5px;
        width: 28px;
        height: 28px;
        background: #fff;
        border-radius: 90px;
        transition: 0.3s;
    }

    input.toggle-switch:checked + label {
        background: rgb(147, 190, 82);
    }

    input.toggle-switch:checked + label:after {
        left: calc(100% - 5px);
        transform: translateX(-100%);
    }

    label.toggle-switch:active:after {
        width: 130px;
    }
</style>
<div class="pcoded-content">
  <div class="pcoded-inner-content">
      <!-- Main-body start -->
      <div class="main-body">
          <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                  <div class="row align-items-end">
                      <div class="col-lg-8">
                          <div class="page-header-title">
                              <i class="fa fa-table bg-c-yellow"></i>
                              <div class="d-inline my-3">
                                  <h4>Customize Home Page</h4>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="page-header-breadcrumb">
                             <ul class="breadcrumb-title">
                              <li class="breadcrumb-item">
                                  <a href="{{ url('admin/dashboard') }}">
                                      <i class="fa fa-home"></i>
                                  </a>
                              </li>
                              <li class="breadcrumb-item"><a href="/">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Customize Home page</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Page-header end -->

          <!-- Page-body start -->
          <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Games Slider</h5>
                </div>
                <div class="card-block">
                    <div class="text-right mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSliderModal">Add Slider</button>
                    </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>
                                    <img src="{{ asset('/storage/sliders/'. $slider->banner) }}" class="img-thumbnail" style="height:100px; width:100px;" alt="">
                                    </td>
                                    <td>
                                        @if ($slider->status === 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Actions</button>
                                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editSliderModal{{ $slider->id }}">Edit</button>
                                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="post" class="form-inline m-0 p-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        <!-- Start:Edit slider model -->
                                        <div class="modal fade" id="editSliderModal{{ $slider->id }}" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Slider</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editSliderForm{{ $slider->id }}" action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="validationMessageBag" value="editSlider{{ $slider->id }}">
                                                            <div class="form-group">
                                                                <label for="">Banner</label>
                                                                <input type="file" name="banner" class="form-control">
                                                                @if ($errors->{'editSlider'.$slider->id}->has('banner'))
                                                                    <div class="error">{{ $errors->{'editSlider'.$slider->id}->first('banner') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Banner Link</label>
                                                                <input type="text" name="link" class="form-control" value="{{ old('link')? old('link'): $slider->link }}">
                                                                @if ($errors->{'editSlider'.$slider->id}->has('link'))
                                                                    <div class="error">{{ $errors->{'editSlider'.$slider->id}->first('link') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Status</label>
                                                                <input type="checkbox" name="status" class="toggle-switch" id="switch{{ $slider->id }}" {{ $slider->status === 1? 'checked': '' }} /><label for="switch{{ $slider->id }}">Toggle</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light " form="editSliderForm{{ $slider->id }}">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End:Edit slider model -->

                                        @if (!$errors->{'editSlider'.$slider->id}->isEmpty())
                                        <script>
                                            window.addEventListener('load', () => document.querySelector('[data-target="#editSliderModal{{ $slider->id }}"]').click());
                                        </script>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic table card end -->
          </div>
          <!-- Page-body end -->
        </div>
      </div>
      <!-- Main-body end -->
  </div>
</div>

<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addSliderForm" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Banner</label>
                        <input type="file" name="banner" class="form-control">
                        @if ($errors->addSlider->has('banner'))
                            <div class="error">{{ $errors->addSlider->first('banner') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Banner Link</label>
                        <input type="text" name="link" class="form-control">
                        @if ($errors->addSlider->has('link'))
                            <div class="error">{{ $errors->addSlider->first('link') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" class="toggle-switch" id="switch" checked /><label for="switch">Toggle</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light " form="addSliderForm">Save</button>
            </div>
        </div>
    </div>
</div>

@if (!$errors->addSlider->isEmpty())
<script>
    window.addEventListener('load', () => document.querySelector('[data-target="#addSliderModal"]').click());
</script>
@endif
@endsection
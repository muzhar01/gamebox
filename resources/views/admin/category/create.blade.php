@extends('admin.layout.layout')
@section('container')
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
                                    <i class="fa fa-file bg-c-blue"></i>
                                    <div class="d-inline">
                                        <h4>Add Category</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">
                                                <i class="fa fa-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Add Category</a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                          <div>
                          <div class="btn-group dropdown-split-success float-right m-1">
                            <button type="button" class="btn btn-success" id="language"><i class="fa fa-language"></i>Language</button>
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle primary</span>
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(113px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item waves-effect waves-light child_language" data-value="english" href="#">English</a>
                                <a class="dropdown-item waves-effect waves-light child_language" data-value="arabic" href="#">Arabic</a>
                            </div>
                          </div>
                        </div>
                         </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Start Form For English -->
                                <div class="card forEnglish">
                                    <div class="card-header">
                                        <h5>Add Category</h5>
                                    </div>
                                    <div class="card-block">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                                </div>
                                                <div class="col-sm-6">
                                                  <label for="">Thumbnail</label>
                                                  <input type="file" name="thumbnail" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row arabicTitle"></div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                  <label for="">Description</label>
                                                  <textarea name="description" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row arabicDescription">
                                            </div>
                                            <div class="">
                                              <button class="btn btn-primary float-right" type="submit">Submit  </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Form For English -->
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
    <script>
      $(document).ready(function () {
        $('.child_language').click(function (e) { 
          e.preventDefault();
          var child_language=$(this).data('value');
          if(child_language=="arabic"){
            $('.arabicTitle').html('');
            $('.arabicDescription').html('');
            $('.arabicTitle').append('<div class="col-sm-6" dir="rtl"><label for="">عنوان</label><input type="text" name="title" class="form-control" placeholder="أدخل العنوان"> </div>');
            $('.arabicDescription').append('<div class="col-sm-12"><label for="">وصف</label><textarea name="description" class="form-control"></textarea></div>');
          }else{
            $('.arabicTitle').html('');
            $('.arabicDescription').html('');
          }
        });
      });
    </script>
@endsection

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
                                    <i class="fa fa-gamepad bg-c-green"></i>
                                    <div class="d-inline my-3">
                                        <h4>Add Game</h4>
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
                                        <li class="breadcrumb-item"><a href="#">Add Game</a>
                                        </li>
                                    </ul>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Game</h5>

                                    </div>
                                    <div class="card-block">
                                        @if(isset($game) && $game->id)
                                            <form action="{{ route('game.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                                            @method('put')
                                        @else
                                            <form action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data">
                                        @endif
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="title">Title</label>
                                                    <input id="title" type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $game->title ?? old('title') ?? '' }}">
                                                    @error('title')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="short-name">Short Name</label>
                                                    <input id="short-name" type="text" name="short_name" class="form-control" placeholder="Enter Short Name" value="{{ $game->short_name ?? old('short_name') ?? '' }}">
                                                    @error('short_name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="">Thumbnail</label>
                                                    <input type="file" name="thumbnail" class="form-control">
                                                    @error('thumbnail')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                  <label for="">Game File(.zip)</label>
                                                  <input type="file" name="gamefile" class="form-control">
                                                    @error('gamefile')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col">
                                                  <label for="">Description</label>
                                                    <textarea name="description" class="form-control" placeholder="Description" rows="3">{{ $game->description ?? old('description') ?? '' }}</textarea>
                                                    @error('description')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                              <button class="btn btn-primary float-right" type="submit">Submit</button>
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
 
        </div>
    </div>
@endsection

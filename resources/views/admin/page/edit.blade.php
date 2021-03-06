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
                                    <i class="fa fa-file bg-c-green"></i>
                                    <div class="d-inline my-3">
                                        <h4>Edit Page</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Edit Page</a>
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
                                        <h5>Edit page</h5>

                                    </div>
                                
                                    <div class="card-body">
                                            <form action="{{ route('admin.page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="title">Title</label>
                                                    <input id="title" type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') ?? $page->title ?? '' }}">
                                                    @error('title')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row">
                                            <div class="col">
                                                  <label for="">Content</label>
                                                    <textarea name="content" class="form-control" placeholder="Page Content" rows="3">{{ old('content') ?? $page->content ?? '' }}</textarea>
                                                    @error('content')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <!-- for arabic -->
                                            <div dir="rtl">
                                                <div class="form-group row arabicTitle"><div class="col-sm-6" dir="rtl"><label for="">??????????</label><input type="text" name="ar_title" class="form-control" value="{{ old('ar_title') ?? $page->ar_title ?? '' }}" placeholder="???????? ??????????????"></div></div>
                                                <div class="form-group row arabicContent"><div class="col-sm-12" dir="rtl"><label for="">?????????? ????????????</label><textarea name="ar_content" class="form-control" placeholder="?????????? ???? ?????? ?????????? ????????????">{{ old('ar_content') ?? $page->content ?? '' }}</textarea></div></div>
                                            </div>
                                            <!-- // for arabic -->
                                            <div class="mt-3">
                                              <button class="btn btn-primary float-right" type="submit">Update</button>
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

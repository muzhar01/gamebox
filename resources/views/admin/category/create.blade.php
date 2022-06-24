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
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Input Grid card start -->
                                <div class="card">
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
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                  <label for="">Description</label>
                                                    <input type="text" name="description" class="form-control" placeholder="col-sm-6">
                                                </div>
                                            </div>
                                            <div class="">
                                              <button class="btn btn-primary float-right" type="submit">Submit  </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Input Grid card end -->
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
@endsection

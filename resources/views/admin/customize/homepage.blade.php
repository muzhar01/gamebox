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
@endsection
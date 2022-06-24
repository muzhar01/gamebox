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
                              <i class="fa fa-table bg-c-green"></i>
                              <div class="d-inline my-3">
                                  <h4>All Games</h4>
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
                              <li class="breadcrumb-item"><a href="#">Games</a>
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
                      <h5>Games</h5>
                      <div class="card-header-right">    
                        <a class="btn btn-primary" href="{{ route('game.create') }}"><i class="fa fa-plus text-white"></i>Add</a>
                      </div>
                  </div>
                  <div class="card-block table-border-style">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Short Name</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($games as $game)
                                  <tr>
                                      <th scope="row">{{ $loop->iteration ?? '#' }}</th>
                                      <td>{{ $game->title ?? '' }}</td>
                                      <td>{{ $game->short_name ?? '' }}</td>
                                      <td></td>
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

  <div id="styleSelector">

  </div>
</div>
@endsection
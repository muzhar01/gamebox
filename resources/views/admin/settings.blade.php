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
                              <i class="ti-settings bg-c-brown" style="background-color:#ab7967;"></i>
                              <div class="d-inline my-3">
                                  <h4>Settings</h4>
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
                              <li class="breadcrumb-item"><a href="#">Settings</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">
                <!-- Logo start -->
                <div class="card">
                    <div class="card-header">
                        <h4>Logo</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-8">
                                <form id="setLogoForm" action="{{ route('admin.settings.set_logo') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Change Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        @error('logo')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="logo-preview">
                                    @if ($logo !== null)
                                        <img class="img-thumbnail" src="{{ asset('/storage/logo/'. $logo->value) }}" alt="" style="margin: auto; display: block; height: 180px; width: 180px;"> 
                                    @else
                                        <img class="img-thumbnail" style="margin: auto; display: block; height: 180px; width: 180px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXh6vH////5+vrl7fPv8/f0+fzt9Pbf6vD+/f/j6/Lf6vL///3f6fLr8fbv8/by9vm0HxD7AAACbUlEQVR4nO3c65abIBRAYVHTDALx/d+2VBuDII6zLHro2t/fmEn2HETn2jQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADkG29irNHa4I9G9+qu83B2BTauu01JIIYUUUkghhbcX/ipFTGH3LKOTUmi6Qq/QGQrLovA8Ckuj8LzqC/98A2ZX5YXd2Lajf6beOaTmwm5+tnnsBNZc+NTt/OaNanWT/U5hzYWjWjzyh1VSqK1ONpTPW/fyz66kcHCqixJtHwSqPvvUKgq1D/Rjik61MZzhWPd5aJ3fTfwR6yn+P4XzBFU8RevCwvzPJCoo9IFmepdmPUUdFuqaZzgt0fcUw8T+88Ar/wrSC/UywemgcKE+7Tg/ZNRY8V2bDScYT9G6r+mdu+fOK8guXE8wmaK/Vet6980PPmUXDvEEVXLRCL942lwGkguny0RSmF76//ILuh/SE1JyYXIObk/xzfn17NJH5BZ+LvSHpmjno10yRbmFySYTDHFjivONnZ9iHC+3MLNE31NcJy7zNsn9m9DC9DIRTXG9UD977jTF1UIVWpjbZDJTDM/YeLsRWfjdBKMprj8d8RRFFm5d6Dca31OM99z1diOwMHehT01TTBe0WV00BBYem+AyRbdxcDhFgYX6YN80RZu5LTCSZ9gcLzSqz+xIZvloAgt/MsN8u+QZUkghhRRSSCGFFFJIIYWXFKqv85Towr3fcDpKSy78xygsjcLzKCyNwvPEFCpthxKsVlIKXVeGE1NYHoUUUkghhRRSeFfh2D6u0o53BOpmuOz/RA17f8MHAAAAAAAAAAAAAAAAAAAAAAAAAAAAALjcb3yLQG5tF3tgAAAAAElFTkSuQmCC" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Logo end -->
            </div>
            <!-- Page-body end -->
          </div>
      </div>
      <!-- Main-body end -->
@endsection
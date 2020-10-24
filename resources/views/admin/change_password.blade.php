@extends('layouts.master')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-lock"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold">Change Password</h1>
                    <small></small>
                </div>
            </div>
        </div>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header clearfix">
                        <h4 class="float-left"><i class="fas fa-lock mr-1"></i>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.change_password')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Old Password <span class="text-danger">*</span></label>
                                <input class="form-control old_password" type="password" name="old_password" placeholder="Old Password" required />
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">New Password <span class="text-danger">*</span></label>
                                <input class="form-control password" type="password" name="password" placeholder="New Password" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password <span class="text-danger">*</span></label>
                                <input class="form-control password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>&nbsp;Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // $("#search_period").dateRangePicker({
        //     format: 'YYYY-MM-DD',
        //     autoClose: false,
        // });
        // $("#btn-reset").click(function(){
        //     $("#search_period").val('');
        // })
    </script>
@endsection

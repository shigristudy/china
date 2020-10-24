@extends('layouts.master')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Permission List</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold">Permission List</h1>
                    <small>Account List</small>
                </div>
            </div>
        </div>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body card-fill">
                    <div class="clearfix">
                        <h5 class="font-weight-bold float-left">
                            Permission List
                        </h5>
                        <form action="" class="form-inline float-right" method="post">
                            @csrf
                            {{--<input type="search" name="user_keyword" class="form-control form-control-sm mr-2" value="{{$user_keyword}}" placeholder="{{__('words.search')}}..." />--}}
                            <button type="button" class="btn btn-sm btn-primary float-right mt-2 mt-md-0" id="btn-add-permission"><i class="fas fa-user-plus mr-1"></i>{{__('words.add_new')}}</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                            <tr class="bg-blue">
                                <th style="width:40px">#</th>
                                <th>Permission</th>
                                <th>Description</th>
                                <th style="width:150px">{{__('words.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data_permission as $item)
                                <tr>
                                    <td>{{ (($data_permission->currentPage() - 1 ) * $data_permission->perPage() ) + $loop->iteration }}</td>
                                    <td class="permission" data-value="{{$item->title}}">{{$item->title}}</td>
                                    <td class="description"></td>
                                    <td class="py-1">
                                        <a href="{{route('superadmin.user.role_delete', $item->id)}}" class="btn btn-sm btn-danger btn-icon mr-1 btn-confirm" data-toggle="tooltip" title="{{__('words.delete')}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" align="center">No Data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix mt-2">
                            <div class="float-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $data_permission->total() }}</strong> Items</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data_permission->appends([
                                    'data_permission' => $data_permission->currentPage(),
                                    'permission_keyword' => $permission_keyword,
                                ])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addPermissionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Permission</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="" id="create_permission_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Permission <span class="text-danger">*</span></label>
                            <input class="form-control permission" type="text" name="title" placeholder="Permission" required />
                            <span class="invalid-feedback permission_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea class="form-control description" name="description" placeholder="Description"></textarea>
                            <span class="invalid-feedback description_error">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>&nbsp;Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>&nbsp;Close </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $("#btn-add-permission").click(function(){
                $("#create_user_form input.form-control").val('');
                $("#create_user_form .invalid-feedback strong").text('');
                $("#addPermissionModal").modal();
            });

            $("#create_permission_form .btn-submit").click(function(){
                $(".page-loader-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('superadmin.user.role_create')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#create_permission_form').serialize(),
                    success : function(response) {
                        $(".page-loader-wrapper").fadeOut();
                        if(response.status.msg == 'success') {
                            swal({
                                    title: response.data,
                                    type: "success",
                                    confirmButtonColor: "#007BFF",
                                    confirmButtonText: "OK",
                                },
                                function(){
                                    window.location.reload();
                                });
                        }
                        else if(response.status.msg == 'error') {
                            let messages = response.data;
                            if(messages.title) {
                                $('#create_permission_form .permission_error strong').text(messages.title[0]);
                                $('#create_permission_form .permission_error').show();
                                $('#create_permission_form .permission').focus();
                            }

                            if(messages.description) {
                                $('#create_permission_form .description_error strong').text(messages.description[0]);
                                $('#create_permission_form .description_error').show();
                                $('#create_permission_form .description').focus();
                            }

                        }
                    },
                    error: function(response) {
                        $(".page-loader-wrapper").fadeOut();
                        swal("Something went wrong", '', "error");
                        console.log(response)
                    }
                });
            });
            $("#pagesize").change(function(){
                $("#pagesize_form").submit();
            });
        });
    </script>
@endsection

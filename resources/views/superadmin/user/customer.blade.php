@extends('layouts.master')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">{{__('words.admin.user.account_list')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold">{{__('words.admin.user.account_list')}}</h1>
                    <small>{{__('words.admin.user.account_list')}}</small>
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
                            {{__('words.admin.user.customer_list')}}
                        </h5>
                        <form action="" class="form-inline float-right" method="post">
                            @csrf
                            <input type="search" name="user_keyword" class="form-control form-control-sm mr-2" value="{{$user_keyword}}" placeholder="{{__('words.search')}}..." />
                            <button type="button" class="btn btn-sm btn-primary float-right mt-2 mt-md-0" id="btn-add-user"><i class="fas fa-user-plus mr-1"></i>{{__('words.add_new')}}</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                            <tr class="bg-blue">
                                <th style="width:40px">#</th>
                                <th>{{__('words.username')}}</th>
                                <th>{{__('words.email')}}</th>
                                <th>{{__('words.company')}}</th>
                                <th>{{__('words.phone_number')}}</th>
                                <th>{{__('words.street')}}</th>
                                <th>{{__('words.house_number')}}</th>
                                <th>{{__('words.zip_code')}}</th>
                                <th>{{__('words.city')}}</th>
                                <th>{{__('words.federal_state')}}</th>
                                <th>{{__('words.country')}}</th>
                                <th>{{__('words.tax_id')}}</th>
                                <th style="width:150px">{{__('words.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data_user as $item)
                                <tr>
                                    <td>{{ (($data_user->currentPage() - 1 ) * $data_user->perPage() ) + $loop->iteration }}</td>
                                    <td class="username" data-value="{{$item->username}}">{{$item->username}}</td>
                                    <td class="email">{{$item->email}}</td>
                                    <td class="company">{{$item->company}}</td>
                                    <td class="phone_number">{{$item->phone_number}}</td>
                                    <td class="street">{{$item->street}}</td>
                                    <td class="house_number">{{$item->house_number}}</td>
                                    <td class="zip_code">{{$item->zip_code}}</td>
                                    <td class="city">{{$item->city}}</td>
                                    <td class="federal_state">{{$item->federal_state}}</td>
                                    <td class="country">{{$item->country}}</td>
                                    <td class="tax_id">{{$item->tax_id}}</td>
                                    <td class="py-1">
                                        <a href="javascript:;" class="btn btn-sm btn-primary btn-icon mr-1 btn-edit-user" data-id="{{$item->id}}" data-toggle="tooltip" title="{{__('words.admin.user.edit')}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.user.delete', $item->id)}}" class="btn btn-sm btn-danger btn-icon mr-1 btn-confirm" data-toggle="tooltip" title="{{__('words.admin.user.delete')}}"><i class="fas fa-trash-alt"></i></a>
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
                                <p>Total <strong style="color: red">{{ $data_user->total() }}</strong> Items</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data_user->appends([
                                    'user' => $data_user->currentPage(),
                                    'agent_keyword' => $user_keyword,
                                ])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Customer</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="" id="create_user_form" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.user.username')}} <span class="text-danger">*</span></label>
                            <input class="form-control username" type="text" name="username" placeholder="{{__('words.admin.user.username')}}" required />
                            <span class="invalid-feedback username_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> {{__('words.admin.user.email')}}<span class="text-danger">*</span></label>
                            <input class="form-control email" type="email" name="email" placeholder="{{__('words.admin.user.email')}}" />
                            <span class="invalid-feedback name_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label"> {{__('words.admin.user.company')}} <span class="text-danger">*</span></label>
                            <input type="text" name="company" class="form-control company" placeholder="{{__('words.admin.user.company')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> {{__('words.admin.user.phone_number')}} </label>
                            <div class="input-group">
                                <input class="form-control phone_number" type="text" name="phone_number" placeholder="{{__('words.admin.user.phone_number')}}" />
                            </div>
                            <span class="invalid-feedback phone_number_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.street')}} <span class="text-danger">*</span></label>
                            <input type="text" name="street" class="form-control street" placeholder="{{__('words.admin.user.street')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.house_number')}} <span class="text-danger">*</span></label>
                            <input type="text" name="house_number" class="form-control house_number" placeholder="{{__('words.admin.user.house_number')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.zip_code')}} <span class="text-danger">*</span></label>
                            <input type="text" name="zip_code" class="form-control zip_code" placeholder="{{__('words.admin.user.zip_code')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.city')}} <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control city" placeholder="{{__('words.admin.user.city')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.federal_state')}} <span class="text-danger">*</span></label>
                            <input type="text" name="federal_state" class="form-control federal_state" placeholder="{{__('words.admin.user.federal_state')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.county')}} <span class="text-danger">*</span></label>
                            <input type="text" name="country" class="form-control country" placeholder="{{__('words.admin.user.country')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.tax_id')}} <span class="text-danger">*</span></label>
                            <input type="text" name="tax_id" class="form-control tax_id" placeholder="{{__('words.admin.user.tax_id')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.user.pwd')}}<span class="text-danger">*</span></label>
                            <input class="form-control password" type="text" name="password" placeholder="{{__('words.admin.user.pwd')}}" required />
                            <span class="invalid-feedback password_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.confirm_pwd')}} <span class="text-danger">*</span></label>
                            <input type="text" name="password_confirmation" class="form-control confirm_password" placeholder="{{__('words.admin.user.confirm_pwd')}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>&nbsp;{{__('words.admin.user.save')}}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>{{__('words.admin.user.close')}} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('words.edit_player')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="" id="edit_user_form" method="post">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.user.username')}} <span class="text-danger">*</span></label>
                            <input class="form-control username" type="text" name="username" placeholder="{{__('words.admin.user.username')}}" required />
                            <span class="invalid-feedback username_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> {{__('words.admin.user.email')}}<span class="text-danger">*</span></label>
                            <input class="form-control email" type="email" name="email" placeholder="{{__('words.admin.user.email')}}" />
                            <span class="invalid-feedback name_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label"> {{__('words.admin.user.company')}} <span class="text-danger">*</span></label>
                            <input type="text" name="company" class="form-control company" placeholder="{{__('words.admin.user.company')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> {{__('words.admin.user.phone_number')}} </label>
                            <div class="input-group">
                                <input class="form-control phone_number" type="text" name="phone_number" placeholder="{{__('words.admin.user.phone_number')}}" />
                            </div>
                            <span class="invalid-feedback phone_number_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.street')}} <span class="text-danger">*</span></label>
                            <input type="text" name="street" class="form-control street" placeholder="{{__('words.admin.user.street')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.house_number')}} <span class="text-danger">*</span></label>
                            <input type="text" name="house_number" class="form-control house_number" placeholder="{{__('words.admin.user.house_number')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.zip_code')}} <span class="text-danger">*</span></label>
                            <input type="text" name="zip_code" class="form-control zip_code" placeholder="{{__('words.admin.user.zip_code')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.city')}} <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control city" placeholder="{{__('words.admin.user.city')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.federal_state')}} <span class="text-danger">*</span></label>
                            <input type="text" name="federal_state" class="form-control federal_state" placeholder="{{__('words.admin.user.federal_state')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.county')}} <span class="text-danger">*</span></label>
                            <input type="text" name="country" class="form-control country" placeholder="{{__('words.admin.user.country')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.tax_id')}} <span class="text-danger">*</span></label>
                            <input type="text" name="tax_id" class="form-control tax_id" placeholder="{{__('words.admin.user.tax_id')}}">
                            <span class="invalid-feedback score_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.user.pwd')}}<span class="text-danger">*</span></label>
                            <input class="form-control password" type="text" name="password" placeholder="{{__('words.admin.user.pwd')}}" required />
                            <span class="invalid-feedback password_error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group password-field">
                            <label class="control-label">{{__('words.admin.user.confirm_pwd')}} <span class="text-danger">*</span></label>
                            <input type="text" name="password_confirmation" class="form-control confirm_password" placeholder="{{__('words.admin.user.confirm_pwd')}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $("#btn-add-user").click(function(){
                $("#create_user_form input.form-control").val('');
                $("#create_user_form .invalid-feedback strong").text('');
                $("#addUserModal").modal();
            });

            $("#create_user_form .btn-submit").click(function(){
                $(".page-loader-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('admin.user.create')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#create_user_form').serialize(),
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
                            if(messages.name) {
                                $('#create_user_form .name_error strong').text(messages.name[0]);
                                $('#create_user_form .name_error').show();
                                $('#create_user_form .name').focus();
                            }

                            if(messages.username) {
                                $('#create_user_form .username_error strong').text(messages.username[0]);
                                $('#create_user_form .username_error').show();
                                $('#create_user_form .username').focus();
                            }

                            if(messages.phone_number) {
                                $('#create_user_form .phone_number_error strong').text(messages.phone_number[0]);
                                $('#create_user_form .phone_number_error').show();
                                $('#create_user_form .phone_number').focus();
                            }

                            if(messages.password) {
                                $('#create_user_form .password_error strong').text(messages.password[0]);
                                $('#create_user_form .password_error').show();
                                $('#create_user_form .password').focus();
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

            $(".btn-edit-user").click(function(){
                let id = $(this).data("id");
                let username = $(this).parents('tr').find(".username").text().trim();
                let email = $(this).parents('tr').find(".email").text().trim();
                let company = $(this).parents('tr').find(".company").text().trim();
                let phone_number = $(this).parents('tr').find(".phone_number").text().trim();
                let street = $(this).parents('tr').find(".street").text().trim();
                let house_number = $(this).parents('tr').find(".house_number").text().trim();
                let zip_code = $(this).parents('tr').find(".zip_code").text().trim();
                let city = $(this).parents('tr').find(".city").text().trim();
                let federal_state = $(this).parents('tr').find(".federal_state").text().trim();
                let country = $(this).parents('tr').find(".country").text().trim();
                let tax_id = $(this).parents('tr').find(".tax_id").text().trim();

                $("#edit_user_form .id").val(id);
                $("#edit_user_form .username").val(username);
                $("#edit_user_form .email").val(email);
                $("#edit_user_form .company").val(company);
                $("#edit_user_form .phone_number").val(phone_number);
                $("#edit_user_form .street").val(street);
                $("#edit_user_form .house_number").val(house_number);
                $("#edit_user_form .zip_code").val(zip_code);
                $("#edit_user_form .city").val(city);
                $("#edit_user_form .federal_state").val(federal_state);
                $("#edit_user_form .country").val(country);
                $("#edit_user_form .tax_id").val(tax_id);


                $("#editUserModal").modal();
            });

            $("#edit_user_form .btn-submit").click(function(){
                $(".page-loader-wrapper").fadeIn();
                let username =  $("#edit_user_form .username").val();
                let phone_number = $("#edit_user_form .phone_number").val();
                let extra_params = "&username=" + username + "&phone_number=" + phone_number;
                $.ajax({
                    url: "{{route('admin.user.edit')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#edit_user_form').serialize() + extra_params,
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

                            if(messages.username) {
                                $('#edit_user_form .username_error strong').text(messages.username[0]);
                                $('#edit_user_form .username_error').show();
                                $('#edit_user_form .username').focus();
                            }

                            if(messages.phone_number) {
                                $('#edit_user_form .phone_number_error strong').text(messages.phone_number[0]);
                                $('#edit_user_form .phone_number_error').show();
                                $('#edit_user_form .phone_number').focus();
                            }

                            if(messages.password) {
                                $('#edit_user_form .password_error strong').text(messages.password[0]);
                                $('#edit_user_form .password_error').show();
                                $('#edit_user_form .password').focus();
                            }
                        }
                    },
                    error: function(response) {
                        $(".page-loader-wrapper").fadeOut();
                        swal("Something went wrong", '', 'error')
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

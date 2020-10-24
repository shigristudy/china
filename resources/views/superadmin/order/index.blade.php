@extends('layouts.master')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"> {{__('words.admin.order.order_list')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold"> {{__('words.admin.order.order_list')}}</h1>
                    <small> {{__('words.admin.order.order_list')}}</small>
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
                            {{__('words.admin.order.order_list')}}
                        </h5>
                        <form action="" class="form-inline float-right" method="post">
                            @csrf
                            <select type="search" class="form-control form-control-sm mr-2" name="order_status">
                                <option value="0" selected>All</option>
                                @foreach($data_order_status as $item)
                                    <option value="{{$item->id}}" @if($item->id == $order_status) selected @endif>{{$item->status}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary float-right mt-2 mt-md-0" id="btn-add-user"><i class="fas fa-shopping-bag mr-1"></i>{{__('words.admin.user.search')}}</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                            <tr class="bg-blue">
                                <th style="width:40px">#</th>
                                <th>{{__('words.admin.order.service_type')}}</th>
                                <th>{{__('words.admin.order.surname')}}</th>
                                <th>{{__('words.admin.order.company')}}</th>
                                <th>{{__('words.admin.order.total_price')}}</th>
                                <th>{{__('words.admin.order.status')}}</th>
                                <th>{{__('words.admin.order.email')}}</th>
                                <th>{{__('words.admin.order.order_created')}}</th>
                                <th style="width:150px">{{__('words.admin.order.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data_order as $item)

                                <tr>
                                    <td>{{ (($data_order->currentPage() - 1 ) * $data_order->perPage() ) + $loop->iteration }}</td>
                                    <td class="service_type" data-value="{{$item->service->name}}">{{$item->service->name}}</td>
                                    <td class="username">{{$item->user->username}}</td>
                                    <td class="company">{{$item->user->company}}</td>
                                    <td class="price">{{$item->price}}</td>
                                    <td class="status" data-value="{{$item->order_status_id}}" style="color:@switch($item->order_status_id) @case(1) lightgrey @break @case(2) darkblue  @break @case(3) green @break @case(4) red  @break @case(5) pink @break @case(6) orange @break @default red @endswitch ">
                                        {{$item->order_status->status}}
                                    </td>
                                    <td class="email">{{$item->user->email}}</td>
                                    <td class="order_created">{{$item->created_at}}</td>
                                    <td class="py-1">
                                        <a href="javascript:;" class="btn btn-sm btn-primary btn-icon mr-1 btn-update-order" data-id="{{$item->id}}" data-toggle="tooltip" title="{{__('words.admin.user.edit')}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('superadmin.order.delete', $item->id)}}" class="btn btn-sm btn-danger btn-icon mr-1 btn-confirm" data-toggle="tooltip" title="{{__('words.admin.user.delete')}}"><i class="fas fa-trash-alt"></i></a>
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
                                <p>{{__('words.admin.order.total')}} <strong style="color: red">{{ $data_order->total() }}</strong> {{__('words.admin.order.items')}}</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data_order->appends([
                                    'order' => $data_order->currentPage(),
                                    'order_status' => $order_status,
                                ])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UpdateOrderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('words.admin.order.change_order_status')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="" id="update_order_form" method="post">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.order.status')}} <span class="text-danger">*</span></label>
                            <select class="form-control order_status" name="order_status">
                                @foreach($data_order_status as $item)
                                    <option value="{{$item->id}}">{{$item->status}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback order_status_error">
                                <strong></strong>
                            </span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>{{__('words.admin.user.update')}}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>{{__('words.admin.user.close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $(".btn-update-order").click(function(){
                let id = $(this).data("id");
                let status = $(this).parents('tr').find(".status").data('value');

                console.log("status_value", status)
                $("#update_order_form .id").val(id);
                $("#update_order_form .order_status").val(status);


                $("#UpdateOrderModal").modal();
            });

            $("#update_order_form .btn-submit").click(function(){
                $(".page-loader-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('superadmin.order.update')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#update_order_form').serialize(),
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

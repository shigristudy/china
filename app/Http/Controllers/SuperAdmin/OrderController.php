<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderStatus;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $mod_order = new Order();
        $order_status = '';

        if ($request->order_status != '' && $request->order_status != 0) {
            $order_status = $request->order_status;
            $mod_order = $mod_order->where(function ($query) use ($order_status) {
                return $query->where('order_status_id', '=', $order_status);
            });

        }

        $data_order = $mod_order->orderBy('created_at', 'desc')->paginate(10, ['*'], 'order');
        $data_order_status = OrderStatus::all();

        return view('superadmin.order.index', compact('data_order', 'data_order_status', 'order_status'));
    }

    public function update(Request $request)
    {
        $order = DB::table('orders')->where('id', $request->id)
            ->update(['order_status_id' => $request->order_status]);
        if (!$order) {
            return responseWrong('Some error occured');
        }

        return responseSuccess('Updated Successfully');

    }
}

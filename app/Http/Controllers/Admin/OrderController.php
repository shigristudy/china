<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderData;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{

    public function index(Request $request) {

        $mod_order = Order::all();
        $order_status =  '';
        $order = array();

        if($request->order_status != '' && $request->order_status != 0) {
            $order_status = $request->order_status;
            $mod_order = $mod_order->where(function($query) use($order_status) {
                return $query->where('order_status_id', '=', $order_status );
            });
        }

        foreach ($mod_order as $item) {
            $item['service_id'] = $item->service->name;
            $item['status'] = $item->order_status->status;
            $item['file_name'] = $item->order_data[0]->file_name;
            $item['orig_name'] = $item->order_data[0]->orig_name;
            $item['user_id'] = $item->user->user_id;
            $item['first_name'] = $item->user->first_name;
            $item['last_name'] = $item->user->last_name;
            $item['email'] = $item->user->email;
            $item['company'] = $item->user->company;
            $item['order_msg'] = $item->order_data[0]->order_msg;
            $item['file_path'] = $item->order_data[0]->file_path;
            if(count($order) > 0 && end($order)['order_number'] === $item['order_number']){
                $fileNames = array();

                foreach (end($order)['file_name'] as $item_file1) {
                    array_push($fileNames, $item_file1);
                }
                array_push($fileNames, $item['file_name']);
                $item['file_name'] = $fileNames;

                $origNames = array();
                foreach (end($order)['orig_name'] as $item_file2) {
                    array_push($origNames, $item_file2);
                }
                array_push($origNames, $item['orig_name']);
                $item['orig_name'] = $origNames;

                array_pop($order);
                array_push($order, $item);
            }
            else {
                $item['file_name'] = array($item['file_name']);
                $item['orig_name'] = array($item['orig_name']);
                array_push($order, $item);
            }

        }

        $order = collect($order)->sortByDesc('created_at')->all();
        $order_data_status = OrderStatus::all();

        return view('admin.order.index', compact('order', 'order_data_status', 'order_status'));
    }

    public function view(Request $request){

        if($request->ajax()){
            $order_id = $request->order_id;
            $data = OrderData::where('order_number', '=', $order_id)->get();
            return response()->json($data, 200);
        }
    }

    public function update(Request $request) {
       $order = DB::table('orders')->where('id', $request->id)
            ->update(['order_status_id' => $request->order_status]);
        if(!$order) {
            return responseWrong('Some error occured');
        }

        return responseSuccess('Updated Successfully!');
    }

    public function delete(Request $request){
        $file_path = DB::table('orders_data')->where('order_number','=', $request->order_number)->get('file_path')[0]->file_path;
        $file_name = DB::table('orders_data')->where('order_number','=', $request->order_number)->pluck('file_name');

        foreach ($file_name as $item){
            File::delete(public_path($file_path.'/'.$item));
        }
        DB::table('orders')->where('order_number', $request->order_number)->delete();
        DB::table('orders_data')->where('order_number', $request->order_number)->delete();
        return back()->with('success','Deleted Successfully!');
    }

    public function message(Request $request){
        if($request->ajax()) {
            $order_id = $request->order_id;
            $data = DB::table('orders_data')->where('order_id', $order_id)->get('order_msg');
            $msg_data = $data[0]->order_msg;
            return response()->json($msg_data, 200);
        }
    }
}

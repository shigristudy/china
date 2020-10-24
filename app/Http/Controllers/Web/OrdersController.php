<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\OrderAdminMail;
use App\Mail\OrderUserMail;
use App\Models\Lang;
use App\Models\LangPrice;
use App\Models\LangService;
use App\Models\LangTranWord;
use App\Models\VoiceoverSample;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Scalar\String_;
use Yajra\DataTables\DataTables;
use DateTime;
use Exception;
use Mail;

class OrdersController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $user = Auth::user();
            $order_data = Order::where('user_id', '=', $user->id)->get();
            $order = array();
            foreach ($order_data as $item) {
                $item['service_id'] = $item->service->name;
                $item['order_status_id'] = $item->order_status->status;
                $item['file_name'] = $item->order_data[0]->file_name;
                $item['user_id'] = $user->user_id;

                if(count($order) > 0 && end($order)['order_number'] === $item['order_number']){
                    $fileNames = array();
                    foreach (end($order)['file_name'] as $item_file) {
                        array_push($fileNames, $item_file);
                    }
                    array_push($fileNames, $item['file_name']);
                    $item['file_name'] = $fileNames;
                    array_pop($order);
                    array_push($order, $item);
                }
                else {
                    $item['file_name'] = array($item['file_name']);
                    array_push($order, $item);
                }
            }

            return DataTables::of($order)->make(true);
        }


        return view('web.pages.user.project');


    }

    public function get_lang() {

        $data_lang = Lang::where('status', '=', 1)->get();

        return response()->json(['data' => $data_lang], 200);

    }

    public function order() {
        $id = Session::get('order_id');
        $data = OrderData::where('id', '=', $id)->get();
        $data_lang = Lang::where('status', '=', 1)->get();
        $data_voiceover = VoiceoverSample::where('lang_id', '=', $data_lang[21]->id)->get();

        if($data[0]->service_id == 1){
            $file_num = $data[0]->file_id;
            $order_data_first_id = $id - $file_num + 1;
            $total_duration = 0;
            for ($i = $order_data_first_id; $i <= $id; $i++){
                $duration = OrderData::where('id', '=', $i)->get('duration')[0]->duration;
                $total_duration = $total_duration + $duration;
            }
            return view('web.pages.user.order.transcription_order', compact('data', 'data_lang', 'total_duration'));
        }
        if($data[0]->service_id == 2){
            return view('web.pages.user.order.translation_order', compact('data', 'data_lang'));
        }
        if($data[0]->service_id == 3){
            return view('web.pages.user.order.voiceover_order', compact('data', 'data_lang', 'data_voiceover'));
        }
    }

    public function get_audio_price(Request $request){
        if($request->ajax()) {
            $source_lang = $request->source_lang;
            $audio_length = $request->audio_length;
            $delivery_type = $request->delivery_type;
            $delivery_date = $request->delivery_date;

            $data = '';
            if(!empty($source_lang) || !empty($audio_length) || !empty($delivery_type || !empty($delivery_date))) {
                $data = $this->getAudioCommonOrder($source_lang, $audio_length, $delivery_type, $delivery_date);
            }
            else{
                return responseWrong("Some error has been occured!");
            }
            return response()->json($data, 200);
        }
    }

    public function getAudioCommonOrder($source_lang, $audio_length, $delivery_type, $delivery_date){

        $source_langName = Lang::where('id', '=', $source_lang)->first();
        $data_price = LangPrice::where([['lang_id', '=', $source_lang],['lang_service_id', '=', $delivery_type]])->get('price');
        $per_price =$data_price[0]->price;
        $timestamp_price = 0.15; $smooth_price = 0.49; $warranty_price = 0.49; $express_price = 0.99;
        $delivery_time = 7; $service_option = "";

        $total_price = $per_price * $audio_length;
        if(intval($delivery_type) == 1){
            $service_package = __('words.web.order.basic');

            if($delivery_date) {
                if(in_array('timestamp', $delivery_date)){
                    $service_option = __('words.common.order_view.timestamp');
                    $per_price = $per_price + $timestamp_price;
                    $total_price = $total_price + $timestamp_price * $audio_length;
                }
                if(in_array('smooth', $delivery_date)){
                    $service_option = $service_option .', '. __('words.common.order_view.smooth');
                    $per_price = $per_price +  $smooth_price;
                    $total_price = $total_price + $smooth_price * $audio_length;
                }
                if(in_array( 'warranty', $delivery_date)) {
                    $service_option = $service_option .', '. __('words.common.order_view.warranty');
                    $per_price = $per_price + $warranty_price;
                    $total_price = $total_price + $warranty_price * $audio_length;
                    $delivery_time = 3;
                }
                if(in_array('express', $delivery_date)) {
                    $service_option = $service_option .', '. __('words.common.order_view.express');
                    $per_price = $per_price + $express_price;
                    $total_price = $total_price + $express_price * $audio_length;
                    $delivery_time = 1;
                }
            }
        }

        if(intval($delivery_type) == 2){
            $service_package = __('words.web.order.advanced');; $delivery_time = 3;
            if($delivery_date){
                if(in_array('express', $delivery_date)) {
                    $service_option = __('words.common.order_view.express');
                    $per_price = $per_price + $express_price;
                    $total_price = $per_price * $audio_length;
                    $delivery_time= 1;
                }
            }
        }

        if(intval($delivery_type) == 3) {
            $service_package = __('words.web.order.premium');; $delivery_time = 3;
            if($delivery_date){
                if(in_array('express', $delivery_date)) {
                    $service_option = __('words.common.order_view.express');
                    $per_price = $per_price + $express_price;
                    $total_price = $per_price * $audio_length;
                    $delivery_time= 1;
                }
            }
        }

        $temp = array(
            "source_lang" => "",
            "audio_length" => "",
            "per_price" => 0,
            "service_package" => "",
            "service_option" => "",
            "delivery_time" => "",
            "total_price" => 0,
        );

        $temp['source_lang'] = $source_langName->lang;
        $temp['audio_length'] = $audio_length;
        $temp['per_price'] = $per_price;
        $temp['service_package'] = $service_package;
        $temp['service_option'] = $service_option;
        $temp['delivery_time'] = $delivery_time;
        $temp['total_price'] = $total_price;
        return $temp;
    }

    public function audio_order(Request $request) {

        if($request->ajax()) {
            $user = Auth::user();
            $source_lang = $request->source_lang;
            $audio_length = $request->audio_length;
            $delivery_type = $request->delivery_type;
            $delivery_date = $request->delivery_date;
            $order_data_id = $request->order_data_id;
            $service_id = $request->service_id;
            $order_msg = $request->order_msg;
            $data = ''; $total_price = 0; $lang_service_id = $delivery_type;
            $source_lang_name = Lang::where('id', '=', $source_lang)->first('lang')->lang;
            if(!empty($source_lang) || !empty($audio_length) || !empty($delivery_type)) {
                $data = $this->getAudioCommonOrder($source_lang, $audio_length, $delivery_type, $delivery_date);
            }

            $total_price = $data['total_price'];
            $service_package = $data['service_package'];
            $service_option = $data['service_option'];
            $order_success = __('words.web.order.order_success');

//      --generate order number--
            $date = new DateTime();
            $format_date = $date->format('Ym');
            $yymm_date = substr($format_date, 2);

            function generatePIN($digits = 4){
                $i = 0; //counter
                $pin = ""; //our default pin is blank.
                while($i < $digits){
                    //generate a random number between 0 and 9.
                    $pin .= mt_rand(0, 9);
                    $i++;
                }
                return $pin;
            }
            $pin = generatePIN();
            $order_number = $yymm_date. $pin;

            $file_num = OrderData::where('id', '=', $order_data_id)->get('file_id')[0]->file_id;
            $order_data_first_id = $order_data_id - $file_num + 1;

            for ($i = $order_data_first_id; $i <= $order_data_id; $i++) {

                //Create New Order
                $new_order = Order::create([
                    'user_id' => Auth::user()->id,
                    'order_number' => $order_number,
                    'order_status_id' => 1,
                    'price' => number_format($total_price, 2, ',', ''),
                    'tax' => 0,
                    'service_id' => $service_id
                ]);

                //Adding Order data

                OrderData::where('id', '=', $i)->update([
                    'order_id' => $new_order->id,
                    'order_number' => $order_number,
                    'service_package' => $service_package,
                    'service_option' => $service_option,
                    'lang_service_id' => $lang_service_id,
                    'source_lang' => $source_lang_name,
                    'order_msg' => $order_msg,
                    'price' => number_format($total_price, 2, ',', ''),
                    'item_cnt' => $audio_length
                ]);
            }

//          {--email send after order--}

            $admin_name=config('mail.from.name');
            $admin_email=config('mail.from.address');
            $file_name = "";
            $file_names = OrderData::where('order_number', '=', $order_number)->pluck('file_name');;

            foreach ($file_names as $item){
                $file_name .= $item.', ';
            }

            $admin_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
            ];
            $user_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
                'order_number' => $order_number,
                'service' => __('words.email.common.transcription'),
                'files' => substr($file_name, 0, -2),
                'cost' =>number_format($total_price, 2, ',', ''),
                'message' => $order_msg
            ];

            try {
                //  send to admin
                $admin_data = new OrderAdminMail($admin_data);
                Mail::to($admin_email)->send($admin_data);
                //  send to User
                $user_data = new OrderUserMail($user_data);
                Mail::to($user->email)->send($user_data);

                return responseSuccess($order_success);
            }
            catch (Exception $e) {

                return response()->json(0);
            }
        }
    }

    public function get_trans_price(Request $request) {
        if($request->ajax()) {
            $source_lang = $request->source_lang;
            $target_lang = $request->target_lang;
            $word_count = $request->word_count;
            $delivery_type = $request->delivery_type;
            $delivery_date = $request->delivery_date;

            $data = '';
            if(!empty($source_lang) || !empty($target_lang) || !empty($word_count) || !empty($delivery_type) || !empty($delivery_date)) {
                $data = $this->getTransCommonOrder($source_lang, $target_lang, $word_count, $delivery_type, $delivery_date);
            }
            else{
                return responseWrong("Some error has been occured!");
            }

            return response()->json($data, 200);
        }
    }

    public function getTransCommonOrder($source_lang, $target_lang, $word_count, $delivery_type, $delivery_date) {

        $source_langName = Lang::where('id', '=', $source_lang)->first();
        $data_detail = array();
        $delivery_time = 'average: 5-6'; $service_option = "";

        if(!is_numeric($target_lang)) {
            $target_lang_array = explode(',', $target_lang);

            foreach ($target_lang_array as $item) {
                $temp = Lang::where('lang', '=', $item)->first('id');
                $normal_priceVal = LangPrice::where([['lang_id', '=', $temp->id], ['lang_service_id', '=', 5]])->get('price');
                $normal_price = $normal_priceVal[0]->price;

                $proofreading_priceVal = LangPrice::where([['lang_id', '=', $temp->id], ['lang_service_id', '=', 6]])->get('price');
                $proofreading_price = $proofreading_priceVal[0]->price;

                if(intval($delivery_type) == 1) {
                    $service_package = __('words.web.order.basic');
                    $per_price = $normal_price * 0.5;
                    $total_price = $per_price * $word_count;
                    if($delivery_date){
                        if(in_array('faster', $delivery_date)) {
                            $service_option = __('words.web.trans_order.fast_time');
                            $delivery_time = 'faster: 2-3';
                            $per_price = $per_price * 1.25;
                            $total_price = $per_price * $word_count;
                        }
                    }
                    $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $item, $service_package, $service_option);
                }

                if(intval($delivery_type) == 2 ){
                    $service_package = __('words.web.order.advanced');
                    $per_price = $normal_price;
                    $total_price = $per_price * $word_count;
                    if($delivery_date) {
                        if(in_array('proofreading', $delivery_date)){
                            $service_option = __('words.web.trans_order.proofreading');
                            $per_price = $per_price + $proofreading_price;
                            $total_price = $per_price * $word_count;
                        };
                        if(in_array('faster', $delivery_date)){
                            $service_option = $service_option .', '. __('words.web.trans_order.fast_time');
                            $delivery_time = 'faster: 2-3';
                            $per_price = $per_price * 1.25;
                            $total_price = $per_price * $word_count ;
                        }
                    }
                    $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $item, $service_package, $service_option);
                }

                if(intval($delivery_type) == 3) {
                    $service_package = __('words.web.order.premium');
                    $per_price = $normal_price + $proofreading_price;
                    $total_price = $per_price * $word_count;
                    if($delivery_date){
                        if(in_array('faster', $delivery_date)) {
                            $service_option = __('words.web.trans_order.fast_time');
                            $delivery_time = 'faster: 2-3';
                            $per_price = $per_price * 1.25 ;
                            $total_price = $per_price * $word_count;
                        }
                    }
                    $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $item, $service_package, $service_option);
                }
                array_push($data_detail, $temp_data);
//
            }
            return $data_detail;
        }
        else{
            $normal_priceVal = LangPrice::where([['lang_id', '=', $target_lang], ['lang_service_id', '=', 5]])->get('price');
            $normal_price = $normal_priceVal[0]->price;
            $proofreading_priceVal = LangPrice::where([['lang_id', '=', $target_lang], ['lang_service_id', '=', 6]])->get('price');
            $proofreading_price = $proofreading_priceVal[0]->price;
            $lang_name = Lang::where('id', '=', $target_lang)->first();

            if(intval($delivery_type) == 1) {
                $service_package = __('words.web.order.basic');
                $per_price = $normal_price * 0.5;
                $total_price = $per_price * $word_count;
                if($delivery_date){
                    if(in_array('faster', $delivery_date)) {
                        $service_option = __('words.web.trans_order.fast_time');
                        $delivery_time = 'faster: 2-3';
                        $per_price = $per_price * 1.25;
                        $total_price = $per_price * $word_count;
                    }
                }
                $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $lang_name->lang, $service_package, $service_option);
            }

            if(intval($delivery_type) == 2 ){
                $service_package = __('words.web.order.advanced');
                $per_price = $normal_price;
                $total_price = $per_price * $word_count;
                if($delivery_date) {
                    if(in_array('proofreading', $delivery_date)){
                        $service_option = __('words.web.trans_order.proofreading');
                        $per_price = $per_price + $proofreading_price;
                        $total_price = $per_price * $word_count;
                    };
                    if(in_array('faster', $delivery_date)){
                        $service_option = $service_option .', '. __('words.web.trans_order.fast_time');
                        $delivery_time = 'faster: 2-3';
                        $per_price = $per_price * 1.25;
                        $total_price = $per_price * $word_count ;
                    }
                }
                $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $lang_name->lang, $service_package, $service_option);
            }

            if(intval($delivery_type) == 3) {
                $service_package = __('words.web.order.premium');
                $per_price = $normal_price + $proofreading_price;
                $total_price = $per_price * $word_count;
                if($delivery_date){
                    if(in_array('faster', $delivery_date)) {
                        $service_option = __('words.web.trans_order.fast_time');
                        $delivery_time = 'faster: 2-3';
                        $per_price = $per_price * 1.25 ;
                        $total_price = $per_price * $word_count;
                    }
                }
                $temp_data = $this->get_trans_temp($per_price, $delivery_time, $total_price, $source_langName, $lang_name->lang, $service_package, $service_option);
            }
            array_push($data_detail, $temp_data);
        }
        return $data_detail;
    }

    public function get_trans_temp($data_per_price, $delivery_time, $total_price, $source_lang, $target_lang, $service_package, $service_option) {
        $temp = array(
            "source_lang" => "",
            "target_lang" => "",
            "service_package" => "",
            "service_option" => "",
            'delivery_time' => "",
            'total_price' => "",
            "data_per_price" => ""
        );

        $temp['source_lang'] = $source_lang->lang;
        $temp['target_lang'] = $target_lang;
        $temp['service_package'] = $service_package;
        $temp['service_option'] = $service_option;
        $temp['delivery_time'] = $delivery_time;
        $temp['total_price'] = $total_price;
        $temp['data_per_price'] = $data_per_price;

        return $temp;
    }

    public function trans_order(Request $request) {

        if($request->ajax()) {
            $user = Auth::user();
            $source_lang = $request->source_lang;
            $target_lang = $request->target_lang;
            $word_count = $request->word_count;
            $delivery_type = $request->delivery_type;
            $delivery_date = $request->delivery_date;
            $order_data_id = $request->order_data_id;
            $service_id = $request->service_id;
            $order_msg = $request->order_msg;

            $data = ''; $total_price = 0; $target_lang_val = "";
            $source_lang_name = Lang::where('id', '=', $source_lang)->first('lang')->lang;

            $order_success = __('words.web.order.order_success');
            if(!empty($source_lang) || !empty($target_lang) || !empty($word_count) || !empty($delivery_type) || !empty($delivery_time)) {
                $data = $this->getTransCommonOrder($source_lang, $target_lang, $word_count, $delivery_type, $delivery_date);
            }

            foreach ($data as $item) {
                $total_price += $item['total_price'];
                $target_lang_val .= $item['target_lang'] .', ';
                $service_package = $item['service_package'];
                $service_option = $item['service_option'];
            }

            $target_lang_name = substr($target_lang_val, 0, -2);

            //--generate order number--
            $date = new DateTime();
            $format_date = $date->format('Ym');
            $yymm_date = substr($format_date, 2);

            function generatePIN($digits = 4){
                $i = 0; //counter
                $pin = ""; //our default pin is blank.
                while($i < $digits){
                    //generate a random number between 0 and 9.
                    $pin .= mt_rand(0, 9);
                    $i++;
                }
                return $pin;
            }
            $pin = generatePIN();
            $order_number = $yymm_date. $pin;

            $file_num = OrderData::where('id', '=', $order_data_id)->get('file_id')[0]->file_id;
            $order_data_first_id = $order_data_id - $file_num + 1;

            for ($i = $order_data_first_id; $i <= $order_data_id; $i++) {

                //Create New Order
                $new_order = Order::create([
                    'user_id' => Auth::user()->id,
                    'order_number' => $order_number,
                    'order_status_id' => 1,
                    'price' => number_format($total_price, 2, ',', ''),
                    'tax' => 0,
                    'service_id' => $service_id
                ]);

                //Adding Order data

                OrderData::where('id', '=', $i)->update([
                    'order_id' => $new_order->id,
                    'order_number' => $order_number,
                    'source_lang' => $source_lang_name,
                    'target_lang' => $target_lang_name,
                    'service_package' => $service_package,
                    'service_option' => $service_option,
                    'order_msg' => $order_msg,
                    'price' => number_format($total_price, 2, ',', ''),
                    'item_cnt' => $word_count
                ]);
            }

//          {--email send after order--}

            $admin_name=config('mail.from.name');
            $admin_email=config('mail.from.address');
            $file_name = "";
            $file_names = OrderData::where('order_number', '=', $order_number)->pluck('file_name');;

            foreach ($file_names as $item){
                $file_name .= $item.', ';
            }

            $admin_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
            ];
            $user_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
                'order_number' => $order_number,
                'service' => __('words.email.common.translation'),
                'files' => substr($file_name, 0, -2),
                'cost' =>number_format($total_price, 2, ',', ''),
                'message' => $order_msg
            ];

            try {
                //  send to admin
                $admin_data = new OrderAdminMail($admin_data);
                Mail::to($admin_email)->send($admin_data);
                //  send to User
                $user_data = new OrderUserMail($user_data);
                Mail::to($user->email)->send($user_data);

                return responseSuccess($order_success);
            }
            catch (Exception $e) {

                return response()->json(0);
            }
        }
    }

    public function get_voice_price(Request $request){
        if($request->ajax()) {
            $source_lang = $request->source_lang;
            $word_count = $request->word_count;
            $voice_num = $request->voice_num;
            $delivery_type = $request->delivery_type;
            $file_editing = $request->file_editing;

            $data = '';
            if(!empty($source_lang) || !empty($word_count) || !empty($voice_num) || !empty($delivery_type)) {
                $data = $this->getVoiceCommonOrder($source_lang, $word_count, $voice_num, $file_editing, $delivery_type);
            }
            else{
                return responseWrong("Some error has been occured!");
            }
            return response()->json($data, 200);
        }
    }

    public function getVoiceCommonOrder($source_lang, $word_count, $voice_num, $file_editing, $delivery_type){

        $data_detail = array();

        if(!is_numeric($source_lang)) {

            $source_lang_array = explode(',', $source_lang);

            foreach ($source_lang_array as $item) {
                $temp = Lang::where('lang', '=', $item)->first('id');
                $word_priceVal = LangPrice::where([['lang_id', '=', $temp->id], ['lang_service_id', '=', 7]])->get('price');
                $word_price = $word_priceVal[0]->price;
                $lang_factorVal = LangPrice::where([['lang_id', '=', $temp->id], ['lang_service_id', '=', 8]])->get('price');
                $lang_factor = $lang_factorVal[0]->price;
                $word_minute = $word_count/110 * $lang_factor;

                if($file_editing == "editing"){
                    $service_option = __('words.web.voice_order.true');
                    $per_price = $word_price + 5;
                    $total_price = $per_price * $word_minute + 200 * $voice_num;
                }
                else{
                    $service_option = __('words.web.voice_order.false');
                    $per_price = $word_price;
                    $total_price = $per_price * $word_minute + 200 * $voice_num;
                }

                $temp_data = $this->get_voice_temp($item, $per_price, $total_price, $delivery_type, $service_option);
                array_push($data_detail, $temp_data);
            }

            return $data_detail;
        }
        else{
            $lang_name = Lang::where('id', '=', $source_lang)->first();
            $word_priceVal = LangPrice::where([['lang_id', '=', $source_lang], ['lang_service_id', '=', 7]])->get('price');
            $word_price = $word_priceVal[0]->price;
            $lang_factorVal = LangPrice::where([['lang_id', '=', $source_lang], ['lang_service_id', '=', 8]])->get('price');
            $lang_factor = $lang_factorVal[0]->price;
            $word_minute = $word_count/110 * $lang_factor;

            if($file_editing == "editing"){
                $service_option = __('words.web.voice_order.true');
                $per_price = $word_price + 5;
                $total_price = $per_price * $word_minute + 200 * $voice_num;
            }
            else{
                $service_option = __('words.web.voice_order.false');
                $per_price = $word_price;
                $total_price = $per_price * $word_minute + 200 * $voice_num;
            }

            $temp_data = $this->get_voice_temp($lang_name->lang, $per_price, $total_price, $delivery_type, $service_option);
            array_push($data_detail, $temp_data);
        }

        return $data_detail;
    }

    public function get_voice_temp($source_lang, $per_price, $total_price, $delivery_type, $service_option) {

        $temp = array(
            "source_lang" => "",
            "service_package" => "",
            "service_option" => "",
            "per_price" => 0,
            'total_price' => 0,
        );

        $temp['source_lang'] = $source_lang;
        $temp['service_package'] = $delivery_type;
        $temp['service_option'] = $service_option;
        $temp['per_price'] = $per_price;
        $temp['total_price'] = $total_price;

        return $temp;
    }

    public function voice_order(Request $request){
        if($request->ajax()) {
            $user = Auth::user();
            $source_lang = $request->source_lang;
            $word_count = $request->word_count;
            $voice_num = $request->voice_num;
            $delivery_type = $request->delivery_type;
            $file_editing = $request->file_editing;
            $order_data_id = $request->order_data_id;
            $service_id = $request->service_id;
            $order_msg = $request->order_msg;

            $data = ''; $total_price = 0; $lang_service_id = 7; $source_lang_val = "";
            $order_success = __('words.web.order.order_success');

            if(!empty($source_lang) || !empty($word_count) || !empty($voice_num) || !empty($file_editing) || !empty($delivery_type)) {
                $data = $this->getVoiceCommonOrder($source_lang, $word_count, $voice_num, $file_editing, $delivery_type);
            }

            foreach ($data as $item) {
                $total_price += $item['total_price'];
                $source_lang_val .= $item['source_lang'] .', ';
                $service_package = $item['service_package'];
                $service_option = $item['service_option'];
            }

            $source_lang_name = substr($source_lang_val, 0, -2);

            //--generate order number--
            $date = new DateTime();
            $format_date = $date->format('Ym');
            $yymm_date = substr($format_date, 2);

            function generatePIN($digits = 4){
                $i = 0; //counter
                $pin = ""; //our default pin is blank.
                while($i < $digits){
                    //generate a random number between 0 and 9.
                    $pin .= mt_rand(0, 9);
                    $i++;
                }
                return $pin;
            }
            $pin = generatePIN();
            $order_number = $yymm_date. $pin;

            $file_num = OrderData::where('id', '=', $order_data_id)->get('file_id')[0]->file_id;
            $order_data_first_id = $order_data_id - $file_num + 1;

            for ($i = $order_data_first_id; $i <= $order_data_id; $i++){
                //
//            //Create New Order
                $new_order = Order::create([
                    'user_id' => Auth::user()->id,
                    'order_number' => $order_number,
                    'order_status_id' => 1,
                    'price' => number_format($total_price,2,',',''),
                    'tax' => 0,
                    'service_id' => $service_id
                ]);

                //Adding Order data

                OrderData::where('id', '=', $i)->update([
                    'order_id' => $new_order->id,
                    'order_number' => $order_number,
                    'voice_num' => $voice_num,
                    'service_package' => $service_package,
                    'service_option' => $service_option,
                    'lang_service_id' => $lang_service_id,
                    'source_lang' => $source_lang_name,
                    'item_cnt' => $word_count,
                    'order_msg' => $order_msg,
                    'price' => number_format($total_price,2,',',''),
                ]);

            }

//          {--email send after order--}

            $admin_name=config('mail.from.name');
            $admin_email=config('mail.from.address');
            $file_name = "";
            $file_names = OrderData::where('order_number', '=', $order_number)->pluck('file_name');;

            foreach ($file_names as $item){
                $file_name .= $item.', ';
            }

            $admin_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
            ];
            $user_data = [
                'name' => $admin_name,
                'admin_email' => $admin_email,
                'order_number' => $order_number,
                'service' => __('words.email.common.voiceover'),
                'files' => substr($file_name, 0, -2),
                'cost' =>number_format($total_price, 2, ',', ''),
                'message' => $order_msg
            ];

            try {
                //  send to admin
                $admin_data = new OrderAdminMail($admin_data);
                Mail::to($admin_email)->send($admin_data);
                //  send to User
                $user_data = new OrderUserMail($user_data);
                Mail::to($user->email)->send($user_data);

                return responseSuccess($order_success);
            }
            catch (Exception $e) {

                return response()->json(0);
            }
        }
    }

    public function order_view(Request $request){

        if($request->ajax()){
            $order_id = $request->order_id;
            $data = OrderData::where('order_number', '=', $order_id)->get();
            return response()->json($data, 200);
        }

    }
}


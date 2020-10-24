<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\LangPrice;
use Egulias\EmailValidator\Exception\ExpectingCTEXT;
use Illuminate\Http\Request;
use App\Models\Lang;
use Illuminate\Support\Facades\DB;

class ServicePriceController extends Controller
{
    public function index(Request $request) {

        $lang = Lang::all();
        $lang_price = LangPrice::all();
        return view('superadmin.price.index', compact('lang', 'lang_price'));

    }

    public function update(Request $request) {
        $result = $request->except(['_token']);
        $mode_data =array(
            'lang_id' => 0,
            'lang_service_id' => 0,
            'price' => 0
        );
        $data = array();
        try{
            foreach ($result as $key => $val ){
                list($service_type, $type_id, $lang_id) = explode('_', $key);
                $mode_data['lang_id'] = $lang_id;
                $mode_data['lang_service_id'] = $type_id;
                $mode_data['price'] = $result[$key];

                array_push($data, $mode_data);
                DB::table('lang_prices')->where('lang_id', '=', $lang_id)
                    ->where('lang_service_id', '=', $type_id)
                    ->update($mode_data);

            }
            return back()->with("success", 'Updated Successfully!');
        }
        catch (\Exception $e) {
            var_dump($e->getMessage());
        }

    }
}

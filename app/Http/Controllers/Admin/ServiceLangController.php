<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\VoiceoverSample;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ServiceLangController extends Controller
{
    //

    public function index()
    {
        $data_service_lang = Lang::all();
        return view('admin.service.index', compact('data_service_lang'));
    }

    public function show_edit($id)
    {

        $lang = DB::table('langs')->where('id', '=', $id)->get();
        $data_voiceover_sample = DB::table('voiceover_samples')->where('lang_id', '=', $id)->get();
        return view('admin.service.edit', compact('data_voiceover_sample', 'lang'));
    }

    public function update_status(Request $request, $lang_id)
    {
        $flag = $request->input('flag');
        DB::table('langs')->where('id', '=', $lang_id)->update(["status" => $flag]);
        return response()->json('success');
    }

    public function upload_file(Request $request)
    {
        $file_data = $request->file('file');
        $lang_id = $request->lang_id;
        if ($file_data) {
            foreach ($file_data as $item) {
                $originalFileName = $item->getClientOriginalName();
                $extension = $item->getClientOriginalExtension();
                $gender = 'male';
                if (strpos($originalFileName, ' female ') !== false) {
                    $gender = 'female';
                }

                if (!file_exists('voiceover_template')) {
                    mkdir('voiceover_template', 0777, true);
                }

                $item->move(public_path('voiceover_template'), $originalFileName);

                VoiceoverSample::create([
                    'lang_id' => $lang_id,
                    'name' => $originalFileName,
                    'gender' => $gender,
                    'orig_name' => $originalFileName
                ]);
//                $lang = Lang::where('id', $lang_id)->get();
//                $lastRow = DB::table('voiceover_samples')->latest()->first();
//                $newName = $lang[0]->lang . ' ' . $gender . ' ' . $lastRow->id .'.' . $extension;
//                VoiceoverSample::where('id', '=', $lastRow->id)->update([
//                    'name' => $newName
//                ]);
            }
            return responseSuccess("Successful uploading!");
        }
        else{
            return responseWrong('Some error has been occured!');
        }

    }

    public function delete_file($id) {
        $item = VoiceoverSample::where('id', '=', $id)->get();
        $file_name = public_path().'/voiceover_template/' . $item[0]->orig_name;
        VoiceoverSample::where('id', '=', $id)->delete();
        if(File::exists($file_name)) {
            File::delete($file_name);
        }
        return back()->with('success', 'Deleted Successfully!');
    }
}

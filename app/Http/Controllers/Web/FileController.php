<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OrderData;
use App\Models\VoiceoverSample;
use Egulias\EmailValidator\Exception\ExpectingCTEXT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;
use Spatie\Dropbox\Exceptions\BadRequest;

class FileController extends Controller
{

    public function audio_fileUpload(Request $request) {

        $authorizationToken = env('DROPBOX_TOKEN');
        $file_path = ''.Auth::user()->user_id.'/transcription/';
        $client = new Client($authorizationToken);
        try {

            $client->createFolder($file_path);
            $order_data = []; $file_id = 0;
            foreach ($request->file('file') as $file) {
                $track = new GetId3($file);
                $originalFileName = time(). ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $files = $track->extractInfo($fileName);
                $client->listFolder($file_path);
                $client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $playtime_seconds = $files['playtime_seconds']/60;
                $duration = ceil($playtime_seconds);
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName,
                    'orig_duration' => $playtime_seconds,
                    'duration' => $duration
                ]);

                array_push($order_data, $temp_data);
            }
        }
        catch (BadRequest $e) {
            $order_data = [];
            $file_id = 0;
            foreach ($request->file('file') as $file) {
                $track = new GetId3($file);
                $originalFileName = time() . ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $files = $track->extractInfo($fileName);
                $client->listFolder($file_path);
                $client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $playtime_seconds = $files['playtime_seconds'] / 60;
                $duration = ceil($playtime_seconds);
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName,
                    'orig_duration' => $playtime_seconds,
                    'duration' => $duration
                ]);

                array_push($order_data, $temp_data);
            }
        }

        $this->setSession(end($order_data)->id);
        $data = [
            'data' => $order_data,
            'file_id' => $file_id,
            'message' => 'Successful upload'
        ];

        return response()->json($data);


    }

    public function trans_fileUpload(Request $request) {

        $authorizationToken = env('DROPBOX_TOKEN');
        $file_path = ''.Auth::user()->user_id.'/translation/';
        $client = new Client($authorizationToken);

        try {
            $client->createFolder($file_path);
            $order_data = []; $file_id = 0;
            foreach ($request->file('file') as $file) {
                $originalFileName = time(). ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $client = new Client($authorizationToken);
                $client->listFolder($file_path);
				$client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName
                ]);

                array_push($order_data, $temp_data);
            }
        }
        catch(BadRequest $e){
            $order_data = []; $file_id = 0;
            foreach ($request->file('file') as $file) {
                $originalFileName = time(). ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $client = new Client($authorizationToken);
                $client->listFolder($file_path);
                $client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName
                ]);

                array_push($order_data, $temp_data);
            }
        }
        $this->setSession(end($order_data)->id);
        $data = [
            'data' => $order_data,
            'file_id' => $file_id,
            'message' => 'Successful upload'
        ];

        return response()->json($data);
    }

    public function voiceover_fileUpload(Request $request)
    {
        $authorizationToken = env('DROPBOX_TOKEN');
        $file_path = ''.Auth::user()->user_id.'/voiceover/';
        $client = new Client($authorizationToken);
        try{
            $client->createFolder($file_path);
            $order_data = []; $file_id = 0;
            foreach ($request->file('file') as $file) {
                $originalFileName = time(). ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $client->listFolder($file_path);
                $client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName
                ]);

                array_push($order_data, $temp_data);
            }
        }
        catch(BadRequest $e){
            $order_data = []; $file_id = 0;
            foreach ($request->file('file') as $file) {
                $originalFileName = time(). ' ' . $file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $client->listFolder($file_path);
                $client->upload(''.$file_path.$originalFileName.'', file_get_contents($file));
                $file_id++;

                $temp_data = OrderData::create([
                    'user_id' => Auth::user()->id,
                    'service_id' => $request->service_id,
                    'file_path' => $file_path,
                    'file_id' => $file_id,
                    'orig_name' => $originalFileName,
                    'file_name' => $fileName
                ]);

                array_push($order_data, $temp_data);
            }
        }
        $this->setSession(end($order_data)->id);
        $data = [
            'data' => $order_data,
            'file_id' => $file_id,
            'message' => 'Successful upload'
        ];

        return response()->json($data);
    }

    function setSession($id) {
        if(!Session::get('order_id')){
            Session::put('order_id', $id);
        }
        else{
            Session::put('order_id', $id);
        }
    }
}

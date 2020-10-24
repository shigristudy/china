<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    function index() {
        if(session()->get('login_type')) {
            session()->forget('login_type');
        }
        session()->put('current_service_type', 0);
        return view('web.pages.home');
    }

    function transcription() {
        session()->put('current_service_type', 1);
        if(session()->get('login_type')) {
            $showModal = true;
            session()->forget('login_type');
            return view('web.pages.transcription', compact('showModal') );
        }
        else {
            $showModal = false;
            return view('web.pages.transcription', compact('showModal'));
        }
    }

    function translation() {
        session()->put('current_service_type', 2);
        if(session()->get('login_type')) {
            $showModal = true;
            session()->forget('login_type');
            return view('web.pages.translation', compact('showModal') );
        }
        else {
            $showModal = false;
            return view('web.pages.translation', compact('showModal'));
        }
    }

    function voiceover() {

        session()->put('current_service_type', 3);
        if(session()->get('login_type')) {
            $showModal = true;
            session()->forget('login_type');
            return view('web.pages.voiceover', compact('showModal') );
        }
        else {
            $showModal = false;
            return view('web.pages.voiceover', compact('showModal'));
        }
    }

	function legals(){
        session()->put('current_service_type');
        return view('web.pages.legals');
    }

    function terms_and_conditions(){
        session()->put('current_service_type');
        return view('web.pages.terms');
    }

    function profile() {

        $user = Auth::user();

        return view('web.pages.user.profile', compact('user'));

    }

}

<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Nexmo;
use Illuminate\Http\Request;

use App\User;
use App\Models\Setting;

class VerifyController extends Controller
{


    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}

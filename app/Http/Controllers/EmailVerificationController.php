<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{


    public function emailsVerificationSuccess()
    {
        return view('emails.verification-result.success');
    }

}

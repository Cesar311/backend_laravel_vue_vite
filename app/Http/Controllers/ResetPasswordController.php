<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request){
        $request->validate([
            "email" => "required|email|exists:users",
        ]);

        $status = Password::sendResetLink(
            $request->only("email")
        );

        if($status == Password::RESET_LINK_SENT) {
            return ["status => __($status)"];
        }
    }

    public function changePassword(Request $request){

    }

}

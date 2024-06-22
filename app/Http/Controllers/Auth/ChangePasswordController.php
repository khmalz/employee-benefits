<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $password_asli = $request->user()->password;
        $password_lama = $request->old_password;

        if (Hash::check($password_lama, $password_asli)) {
            $request->user()->update([
                'password' => bcrypt(request('password'))
            ]);

            return back()->with('success', 'Ganti Password Berhasil');
        }

        return back()->with('fail', 'Ganti Password Gagal');
    }
}

<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        // Yahan aap admin dashboard ya koi aur view return kar sakti hain
        return view('admin.dashboard'); // Ensure that this view exists.
    }

    public function verifyOtp(Request $request)
    {
        // OTP verification ka logic yahan likhein...
        if ($otpIsValid) {
            // Agar OTP sahi hai to home page par redirect kar dein
            return redirect()->route('home');
        }

        // Agar OTP galat hai to error message ke sath wapas le aayein
        return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
    }
}


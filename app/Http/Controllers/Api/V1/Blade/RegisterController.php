<?php

namespace App\Http\Controllers\Api\V1\Blade;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        try {
            $user = User::create($request->validated());
            Auth::login($user);
            return  redirect()->intended('/inquiries')
                ->with('success', 'Register done.!');
        } catch (\Exception $e) {
            Log::error('Error registering user web: ' . $e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => 'somthing goes wrong....please try agian']);
        }
    }
}

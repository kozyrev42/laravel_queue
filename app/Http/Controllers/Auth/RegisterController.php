<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MobileEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use App\Jobs\SendWelcomeEmailJob;
use App\Jobs\SendMobileEmailJob;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3',
        ]);

        if ($validatedData->fails()) {
            return response(['errors' => $validatedData->errors()], 422);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // отправка 2-х письма, при успешной регистрации
        // отправка 2-х email - примерно 4 секунды
        // синхронная отправка сообщений
        //Mail::to($user->email)->send(new WelcomeEmail($user));
        //Mail::to($user->email)->send(new MobileEmail($user));

        // асинхронная отправка, с помощью очередей
        SendWelcomeEmailJob::dispatch($user);
        SendMobileEmailJob::dispatch($user);

        return response(['user' => $user], 201);
    }
}

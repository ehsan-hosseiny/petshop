<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
       resolve(AuthServiceInterface::class)->register($request->name,$request->email,$request->password);
        return response()->json(['data'=>'','message' => __('auth.register_success')], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        if($data = resolve(AuthServiceInterface::class)->login($request->email,$request->password)){
            return response()->json(['data' => $data,'message'=>__('auth.login_success')], Response::HTTP_OK);
        }
        return response()->json(['data'=>'','message' => __('auth.failed')], Response::HTTP_UNAUTHORIZED);

    }
}

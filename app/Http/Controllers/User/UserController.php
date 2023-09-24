<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankOrderRequest;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function setRankOrder(RankOrderRequest $request)
    {
        resolve(UserServiceInterface::class)->rankOrder($request->order_id,auth()->user()->id,$request->rate,
        $request->feedback);
        return response()->json(['data'=>'','message' => __('common.success')], Response::HTTP_CREATED);
    }
}

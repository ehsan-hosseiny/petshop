<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Interfaces\OrderServiceInterface;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function orderList()
    {
        $data = resolve(OrderServiceInterface::class)->orderList();

        return response()->json(['data' => OrderResource::collection($data)->response()->getData(true),
            'message'=>''], Response::HTTP_OK);

    }
}

<?php

namespace App\Http\Requests\Rule;

use App\Models\Order;
use Illuminate\Contracts\Validation\Rule;

class UserOrderValidationRule implements Rule
{

    public function passes($attribute, $value)
    {
        // we can also implement this validation as middleware
        return Order::where(['id'=>$value,'user_id'=>auth()->user()->id])->exists();
    }

    public function message()
    {
        return __('order.wrong_order');
    }
}

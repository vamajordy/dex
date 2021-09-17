<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected Order $order;

    /**
     * ApiController constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function callback(Request $request): JsonResponse
    {
        if ($request->status == $this->order::STATUS_SUCCESS) {
//            $this->order->update(); предусмотреть было написано в задаче

            return response()->json(['url' => route('thank-you')]);
        }

        return response()->json(['url' => route('sorry'), 'details' => $request->all()]);
    }
}

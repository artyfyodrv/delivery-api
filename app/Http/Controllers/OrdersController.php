<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderValidation;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class OrdersController extends ResponseController
{
    public function create(OrderValidation $request)
    {
        try {
            $order = Order::query()->create($request->all());
        } catch (Throwable $t) {
            Log::error($t . ' ' . __FILE__ . ' ' . __LINE__);

            return $this->sendError(
                'Произошла ошибка при формировании заказа',
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->sendResponse($order);
    }

    public function list()
    {
        try {
            $data = Order::query()->paginate(15);
        } catch (Throwable $t) {
            Log::error($t . ' ' . __FILE__ . ' ' . __LINE__);

            return $this->sendError(
                'Произошла ошибка при получении списка заказов',
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->sendResponse($data);
    }

    public function get($id)
    {
        try {
            $data = Order::query()->where('id', $id)->get();
        } catch (Throwable $t) {
            Log::error($t . ' ' . __FILE__ . ' ' . __LINE__);

            return $this->sendError(
                'Произошла ошибка при получении заказа',
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->sendResponse($data);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\OrderValidation;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class OrdersController extends ResponseController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(OrderValidation $request): JsonResponse
    {
        try {
            $data = $this->orderService->create($request);
        } catch (Throwable $t) {
            Log::error($t . ' ' . __FILE__ . ' ' . __LINE__);

            return $this->sendError(
                'Произошла ошибка при формировании заказа',
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->sendResponse($data);
    }

    public function list(): JsonResponse
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

    public function get($id): JsonResponse
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

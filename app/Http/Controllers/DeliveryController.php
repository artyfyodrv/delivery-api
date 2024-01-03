<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DeliveryController extends ResponseController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function orderInfo($orderId) : JsonResponse
    {
        try {
            $data = $this->orderService->getDeliveryOrder($orderId);
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

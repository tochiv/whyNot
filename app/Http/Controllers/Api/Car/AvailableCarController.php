<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\AvailableCarService;

class AvailableCarController extends Controller
{
    public function __construct(
        private readonly AvailableCarService $service
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/cars/available",
     *     summary="Получить доступные автомобили",
     *     description="Возвращает список доступных автомобилей",
     *     tags={"Cars"},
     *     @OA\Response(
     *         response=200,
     *         description="Список доступных автомобилей",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", description="ID автомобиля"),
     *                 @OA\Property(property="name", type="string", description="Название автомобиля"),
     *                 @OA\Property(property="configurations", type="array", @OA\Items(type="object")),
     *                 @OA\Property(property="prices", type="array", @OA\Items(type="object"))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ошибка сервера",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Описание ошибки")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $cars = $this->service->getAvailableCars();

        return response()->json($cars);
    }
}

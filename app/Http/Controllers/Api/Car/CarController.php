<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Car;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Car\CarRepository;
use App\Http\Requests\Api\Car\CarRequest;

/**
 * @OA\Tag(
 *     name="Cars",
 *     description="API для управления автомобилями"
 * )
 */
class CarController extends Controller
{
    public function __construct(
        protected CarRepository $carRepository
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/cars",
     *     summary="Получить список автомобилей",
     *     tags={"Cars"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Car"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $cars = $this->carRepository->all();

        return response()->json($cars);
    }

    /**
     * @OA\Post(
     *     path="/api/cars",
     *     summary="Создать новый автомобиль",
     *     tags={"Cars"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CarRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создано",
     *         @OA\JsonContent(ref="#/components/schemas/Car")
     *     )
     * )
     */
    public function store(CarRequest $request): JsonResponse
    {
        $car = $this->carRepository->create($request->validated());

        return response()->json($car, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/cars/{id}",
     *     summary="Получить один автомобиль",
     *     tags={"Cars"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID автомобиля",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/Car")
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(
            $this->carRepository->show($id)
        );
    }

    /**
     * @OA\Put(
     *     path="/api/cars/{id}",
     *     summary="Обновить автомобиль",
     *     tags={"Cars"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CarRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешное обновление",
     *         @OA\JsonContent(ref="#/components/schemas/Car")
     *     )
     * )
     */
    public function update(CarRequest $request, int $id): JsonResponse
    {
        $updated = $this->carRepository->update($id, $request->validated());

        return response()->json($updated);
    }

    /**
     * @OA\Delete(
     *     path="/api/cars/{id}",
     *     summary="Удалить автомобиль",
     *     tags={"Cars"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Автомобиль успешно удалён"
     *     )
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $this->carRepository->delete($id);

        return response()->json([
            'message' => 'Car was successfully deleted.',
        ]);
    }
}

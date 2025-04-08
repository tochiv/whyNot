<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Price;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Price\PriceStoreRequest;
use App\Http\Requests\Api\Price\PriceUpdateRequest;
use App\Repositories\Contracts\PriceRepositoryInterface;

class PriceController extends Controller
{
    public function __construct(
        private readonly PriceRepositoryInterface $repository
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/prices",
     *     summary="Получить список всех цен",
     *     tags={"Prices"},
     *     @OA\Response(
     *         response=200,
     *         description="Список цен",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Price"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->all());
    }

    /**
     * @OA\Post(
     *     path="/api/prices",
     *     summary="Создать новую цену",
     *     tags={"Prices"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PriceStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Цена успешно создана",
     *         @OA\JsonContent(ref="#/components/schemas/Price")
     *     )
     * )
     */
    public function store(PriceStoreRequest $request): JsonResponse
    {
        $price = $this->repository->store($request->validated());

        return response()->json($price, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/prices/{id}",
     *     summary="Получить цену по ID",
     *     tags={"Prices"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID цены",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Данные цены",
     *         @OA\JsonContent(ref="#/components/schemas/Price")
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->repository->show($id));
    }

    /**
     * @OA\Put(
     *     path="/api/prices/{id}",
     *     summary="Обновить цену",
     *     tags={"Prices"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID цены",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PriceUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Цена успешно обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Price")
     *     )
     * )
     */
    public function update(PriceUpdateRequest $request, int $id): JsonResponse
    {
        return response()->json(
            $this->repository->update($id, $request->validated())
        );
    }

    /**
     * @OA\Delete(
     *     path="/api/prices/{id}",
     *     summary="Удалить цену",
     *     tags={"Prices"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID цены",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Цена успешно удалена",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Price entry was successfully deleted."
     *             )
     *         )
     *     )
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $this->repository->delete($id);

        return response()->json([
            'message' => 'Price entry was successfully deleted.',
        ]);
    }
}

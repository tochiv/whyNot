<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Option;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Option\OptionRepository;
use App\Http\Requests\Api\Option\OptionRequest;

class OptionController extends Controller
{
    public function __construct(
        protected OptionRepository $optionRepository
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/options",
     *     summary="Получить список всех опций",
     *     tags={"Options"},
     *     @OA\Response(
     *         response=200,
     *         description="Список опций",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Option"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $options = $this->optionRepository->all();

        return response()->json($options);
    }

    /**
     * @OA\Post(
     *     path="/api/options",
     *     summary="Создать новую опцию",
     *     tags={"Options"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OptionRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Опция успешно создана",
     *         @OA\JsonContent(ref="#/components/schemas/Option")
     *     )
     * )
     */
    public function store(OptionRequest $request): JsonResponse
    {
        $option = $this->optionRepository->create($request->validated());

        return response()->json($option, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/options/{id}",
     *     summary="Получить одну опцию по ID",
     *     tags={"Options"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID опции",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Данные опции",
     *         @OA\JsonContent(ref="#/components/schemas/Option")
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(
            $this->optionRepository->show($id)
        );
    }

    /**
     * @OA\Put(
     *     path="/api/options/{id}",
     *     summary="Обновить опцию",
     *     tags={"Options"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID опции",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OptionRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Опция успешно обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Option")
     *     )
     * )
     */
    public function update(OptionRequest $request, int $id): JsonResponse
    {
        $updated = $this->optionRepository->update($id, $request->validated());

        return response()->json($updated);
    }

    /**
     * @OA\Delete(
     *     path="/api/options/{id}",
     *     summary="Удалить опцию",
     *     tags={"Options"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID опции",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Опция успешно удалена",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Option was successfully deleted."
     *             )
     *         )
     *     )
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $this->optionRepository->delete($id);

        return response()->json([
            'message' => 'Option was successfully deleted.',
        ]);
    }
}

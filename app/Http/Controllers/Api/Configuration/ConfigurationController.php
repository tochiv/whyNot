<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Configuration;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Configuration\ConfigurationRequest;
use App\Repositories\Contracts\ConfigurationRepositoryInterface;

/**
 * @OA\Tag(
 *     name="Configurations",
 *     description="Управление комплектациями автомобилей"
 * )
 */
class ConfigurationController extends Controller
{
    public function __construct(
        private readonly ConfigurationRepositoryInterface $repository
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/configurations",
     *     tags={"Configurations"},
     *     summary="Получить список всех комплектаций",
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ"
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->all());
    }

    /**
     * @OA\Post(
     *     path="/api/configurations",
     *     tags={"Configurations"},
     *     summary="Создать новую комплектацию",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ConfigurationRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Комплектация успешно создана"
     *     )
     * )
     */
    public function store(ConfigurationRequest $request): JsonResponse
    {
        $configuration = $this->repository->store($request->validated());

        return response()->json($configuration, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/configurations/{id}",
     *     tags={"Configurations"},
     *     summary="Получить комплектацию по ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID комплектации",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->repository->show($id));
    }

    /**
     * @OA\Put(
     *     path="/api/configurations/{id}",
     *     tags={"Configurations"},
     *     summary="Обновить комплектацию по ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID комплектации",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ConfigurationRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Комплектация успешно обновлена"
     *     )
     * )
     */
    public function update(ConfigurationRequest $request, int $id): JsonResponse
    {
        return response()->json(
            $this->repository->update($id, $request->validated())
        );
    }

    /**
     * @OA\Delete(
     *     path="/api/configurations/{id}",
     *     tags={"Configurations"},
     *     summary="Удалить комплектацию по ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID комплектации",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Комплектация успешно удалена"
     *     )
     * )
     */
    public function destroy(int $id): JsonResponse
    {
        $this->repository->delete($id);

        return response()->json([
            'message' => 'Configuration was successfully deleted.',
        ]);
    }
}

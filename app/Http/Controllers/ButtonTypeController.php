<?php

namespace App\Http\Controllers;

use App\Core\Domain\Button\Services\ButtonTypeService;
use App\Http\Requests\CreateButtonRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Info(title="Exemple Creational Pattern Factory Method", version="0.1")
 */
class ButtonTypeController extends BaseController
{
    private ButtonTypeService $buttonTypeService;

    public function __construct(ButtonTypeService $buttonTypeService)
    {
        $this->buttonTypeService = $buttonTypeService;
    }

    /**
     * @OA\Post(
     *     path="/api/button",
     *     summary="Create a new button",
     *     tags={"Create Button"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"label","platform"},
     *             @OA\Property(property="label", type="string", example="Click Me"),
     *             @OA\Property(property="platform", type="string", enum={"windows","ios"}, example="windows")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Button created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="label", type="string", example="Click Me"),
     *             @OA\Property(property="platform", type="string", example="windows")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The label field is required. (and 1 more error)"),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="label", type="array",
     *                     @OA\Items(type="string", example="The label field is required.")
     *                 ),
     *                 @OA\Property(property="platform", type="array",
     *                     @OA\Items(type="string", example="The platform field is required.")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(CreateButtonRequest $request)
    {
        try {
            $label = $request->input('label');
            $platform = $request->input('platform');
            $button = $this->buttonTypeService->create($label, $platform);
            return response()->json($button->toArray(), 201);
        } catch (\InvalidArgumentException $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

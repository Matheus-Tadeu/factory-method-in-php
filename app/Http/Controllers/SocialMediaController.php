<?php

namespace App\Http\Controllers;

use App\Core\Domain\SocialMidia\Services\SocialMediaService;
use App\Http\Requests\SocialMediaRequest;

class SocialMediaController extends Controller
{
    private SocialMediaService $socialMediaService;

    public function __construct(SocialMediaService $socialMediaService)
    {
        $this->socialMediaService = $socialMediaService;
    }

    /**
     * @OA\Post(
     *     path="/api/socialmedia/{platform}",
     *     summary="Post content to a social media platform",
     *     tags={"Social Media"},
     *     @OA\Parameter(
     *         name="platform",
     *         in="path",
     *         description="The social media platform to post to",
     *         required=true,
     *         @OA\Schema(type="string", enum={"facebook", "linkedin"})
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"content"},
     *             @OA\Property(property="content", type="string", example="Hello, World!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Content posted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="content", type="string", example="Hello, World!"),
     *             @OA\Property(property="platform", type="string", example="twitter")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The selected platform is invalid."),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="platform", type="array",
     *                     @OA\Items(type="string", example="The selected platform is invalid.")
     *                 ),
     *                 @OA\Property(property="content", type="array",
     *                     @OA\Items(type="string", example="The content field is required.")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(SocialMediaRequest $request, $platform)
    {
        try {
            $content = $request->get('content');
            $post = $this->socialMediaService->post($platform, $content);
            return response()->json($post->toArray(), 201);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}

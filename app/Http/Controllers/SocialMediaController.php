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

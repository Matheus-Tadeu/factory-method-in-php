<?php

namespace App\Http\Controllers;

use App\Core\Domain\Button\Services\ButtonTypeService;
use App\Http\Requests\CreateButtonRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class ButtonTypeController extends BaseController
{
    private $buttonTypeService;

    public function __construct(ButtonTypeService $buttonTypeService)
    {
        $this->buttonTypeService = $buttonTypeService;
    }

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

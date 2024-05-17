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

    public function create(CreateButtonRequest $request)
    {
        try {
            $label = $request->input('label');
            $type = $request->input('type');
            $button = $this->buttonTypeService->initialize($label, $type);
            return response()->json($button->toArray(), 201);
        } catch (\InvalidArgumentException $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

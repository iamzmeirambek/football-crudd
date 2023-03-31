<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandbookStatusRequest;
use App\Http\Resources\HandbookStatusResource;
use App\Models\HandbookStatus;
use Illuminate\Http\Request;

class HandbookStatusController extends Controller
{
    public function index(Request $request)
    {
        return HandbookStatusResource::collection(HandbookStatus::query()->paginate($request->per_page ?? 15));
    }

    public function show(HandbookStatus $handbookStatus)
    {
        return new HandbookStatusResource($handbookStatus);
    }

    public function store(HandbookStatusRequest $handbookStatusRequest)
    {
        return new HandbookStatusResource(HandbookStatus::query()->create($handbookStatusRequest->validated()));
//        return response()->json([
//            'message' => 'success'
//        ], 201);
    }

    public function update(HandbookStatusRequest $handbookStatusRequest, HandbookStatus $handbookStatus)
    {
        $handbookStatus->update($handbookStatusRequest->validated());
        return new HandbookStatusResource($handbookStatus);
    }

    public function destroy(HandbookStatus $handbookStatus){
        $handbookStatus->delete();
        return response()->json([
            'message' => 'success'
        ],203);
    }
}

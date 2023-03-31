<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        return  ApplicationResource::collection(Application::query()->paginate($request-> per_page ?? 15));
    }

    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }
    public function store(ApplicationRequest $applicationRequest)
    {
        $application = Application::query()->create($applicationRequest->validated());
        return response()->json($application);
    }
    public function update(ApplicationRequest $applicationRequest, Application $application)
    {
        $application->update($applicationRequest->validated());
        return new ApplicationResource($application);
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return response()->json([
            'message' => 'success'
        ],203);
    }


}

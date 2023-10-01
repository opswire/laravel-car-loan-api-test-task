<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    const RELATIONS_CONTACT_NAME = 'dealer.contact';
    const DEFAULT_PER_PAGE = 5;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = $request->query('per_page', self::DEFAULT_PER_PAGE);

        $applications = Application::with(self::RELATIONS_CONTACT_NAME)
                                   ->paginate($perPage);

        return ApplicationResource::collection($applications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApplicationRequest $request): ApplicationResource
    {
        $data = $request->validated();

        $application = Application::create($data);
        $application->load(self::RELATIONS_CONTACT_NAME);

        return new ApplicationResource($application);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): ApplicationResource
    {
        $application = Application::with(self::RELATIONS_CONTACT_NAME)
                                  ->findOrFail($id);

        return new ApplicationResource($application);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApplicationRequest $request, string $id): ApplicationResource
    {
        $data = $request->validated();

        $application = Application::findOrFail($id);
        $application->update($data);
        $application->load(self::RELATIONS_CONTACT_NAME);

        return new ApplicationResource($application);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

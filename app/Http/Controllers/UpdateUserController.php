<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\BoundedContext\User\Infrastructure\UpdateUserController as UpdateUserControllerInfrastructure;

class UpdateUserController extends Controller
{
    /**
     * @var UpdateUserControllerInfrastructure
     */
    private UpdateUserControllerInfrastructure $updateUserController;

    public function __construct(UpdateUserControllerInfrastructure $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $updatedUser = new UserResource($this->updateUserController->__invoke($request));
        return response($updatedUser, 200);
    }
}

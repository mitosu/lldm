<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use src\BlogNewsSite\User\Infrastructure\CreateUserController as CreateUseControllerInfrastructure;

class CreateUserController extends Controller
{
    /**
     * @var \Src\BlogNewsSite\User\Infrastructure\CreateUserController
     */
    private CreateUseControllerInfrastructure $createUserController;

    public function __construct(CreateUseControllerInfrastructure $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $newUser = new UserResource($this->createUserController->__invoke($request));
        return response($newUser, 201);
    }
}

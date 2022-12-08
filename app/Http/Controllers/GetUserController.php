<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use src\BlogNewsSite\User\Infrastructure\GetUserController as GetUserControllerInfrastructure;

class GetUserController extends Controller
{
    /**
     * @var \Src\BlogNewsSite\User\Infrastructure\GetUserController
     */
    private GetUserControllerInfrastructure $getUserController;

    public function __construct(GetUserControllerInfrastructure $getUserController)
    {
        $this->getUserController = $getUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $user = new UserResource($this->getUserController->__invoke($request));

        return response($user, 200);
    }
}

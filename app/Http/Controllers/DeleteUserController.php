<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use src\BlogNewsSite\User\Infrastructure\DeleteUserController as DeleteUserControllerInfrastructure;

class DeleteUserController extends Controller
{
    /**
     * @var \Src\BlogNewsSite\User\Infrastructure\DeleteUserController
     */
    private DeleteUserControllerInfrastructure $deleteUserController;

    public function __construct(DeleteUserControllerInfrastructure $deleteUserController)
    {
        $this->deleteUserController = $deleteUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $this->deleteUserController->__invoke($request);
        return response([], 204);
    }
}

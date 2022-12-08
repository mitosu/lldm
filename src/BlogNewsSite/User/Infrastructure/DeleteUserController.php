<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Infrastructure;

use Illuminate\Http\Request;
use src\BlogNewsSite\User\Application\DeleteUserUseCase;
use src\BlogNewsSite\User\Infrastructure\Repositories\EloquentUserRepository;

final class DeleteUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;
        $deleteUserUseCase = new DeleteUserUseCase($this->repository);
        $deleteUserUseCase->__invoke($userId);
    }
}

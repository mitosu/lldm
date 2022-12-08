<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Infrastructure;

use Illuminate\Http\Request;
use src\BlogNewsSite\User\Application\GetUserUseCase;
use src\BlogNewsSite\User\Infrastructure\Repositories\EloquentUserRepository;

final class GetUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;

        $getUserUseCase = new GetUserUseCase($this->repository);
        $user           = $getUserUseCase->__invoke($userId);

        return $user;
    }
}

<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Application;

use src\BlogNewsSite\User\Domain\Contracts\UserRepositoryContract;
use src\BlogNewsSite\User\Domain\User;
use src\BlogNewsSite\User\Domain\ValueObjects\UserId;

final class GetUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId): ?User
    {
        $id = new UserId($userId);
        return $this->repository->find($id);
    }
}

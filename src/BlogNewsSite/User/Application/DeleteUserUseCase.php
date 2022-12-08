<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Application;

use src\BlogNewsSite\User\Domain\Contracts\UserRepositoryContract;
use src\BlogNewsSite\User\Domain\ValueObjects\UserId;

final class DeleteUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId): void
    {
        $id = new UserId($userId);
        $this->repository->delete($id);
    }
}

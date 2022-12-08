<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Application;

use src\BlogNewsSite\User\Domain\Contracts\UserRepositoryContract;
use src\BlogNewsSite\User\Domain\User;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmail;
use src\BlogNewsSite\User\Domain\ValueObjects\UserName;

final class GetUserByCriteriaUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $userEmail): ?User
    {
        $email = new UserEmail($userEmail);
        return $this->repository->findByCriteria($email);
    }
}

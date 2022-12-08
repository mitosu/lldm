<?php

declare(strict_types=1);

namespace Src\BlogNewsSite\User\Application;

use DateTime;
use src\BlogNewsSite\User\Domain\Contracts\UserRepositoryContract;
use src\BlogNewsSite\User\Domain\User;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmail;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmailVerifiedDate;
use src\BlogNewsSite\User\Domain\ValueObjects\UserId;
use src\BlogNewsSite\User\Domain\ValueObjects\UserName;
use Src\BlogNewsSite\User\Domain\ValueObjects\LastName;
use src\BlogNewsSite\User\Domain\ValueObjects\UserPassword;
use src\BlogNewsSite\User\Domain\ValueObjects\UserRememberToken;

final class UpdateUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        int $userId,
        string $userName,
        string $lasName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,
        ?string $userRememberToken
    ): void
    {
        $id                = new UserId($userId);
        $name              = new UserName($userName);
        $lastname          = new LastName($lasName);
        $email             = new UserEmail($userEmail);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password          = new UserPassword($userPassword);
        $rememberToken     = new UserRememberToken($userRememberToken);

        $user = User::create($name, $lastname, $email, $emailVerifiedDate, $password, $rememberToken);

        $this->repository->update($id, $user);
    }
}

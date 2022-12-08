<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Domain\Contracts;

use src\BlogNewsSite\User\Domain\User;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmail;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmailVerifiedDate;
use src\BlogNewsSite\User\Domain\ValueObjects\UserId;
use src\BlogNewsSite\User\Domain\ValueObjects\UserName;

interface UserRepositoryContract
{
    public function find(UserId $id): ?User;

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User;

    public function save(User $user): void;

    public function update(UserId $userId, User $user): void;

    public function delete(UserId $id): void;
}

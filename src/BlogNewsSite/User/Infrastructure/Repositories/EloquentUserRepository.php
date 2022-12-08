<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Infrastructure\Repositories;

use App\Models\User as EloquentUserModel;
use src\BlogNewsSite\User\Domain\User;
use src\BlogNewsSite\User\Domain\Contracts\UserRepositoryContract;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmail;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmailVerifiedDate;
use src\BlogNewsSite\User\Domain\ValueObjects\UserId;
use src\BlogNewsSite\User\Domain\ValueObjects\UserName;
use Src\BlogNewsSite\User\Domain\ValueObjects\LastName;
use src\BlogNewsSite\User\Domain\ValueObjects\UserPassword;
use src\BlogNewsSite\User\Domain\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepositoryContract
{
    private EloquentUserModel $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

        // Return Domain User model
        return new User(
            new UserName($user->name),
            new LastName($user->lastname),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function findByCriteria(UserName $name, UserEmail $email): ?User
    {
        $user = $this->eloquentUserModel
            ->where('email', $email->value())
            ->firstOrFail();

        // Return Domain User model
        return new User(
            new UserName($user->name),
            new LastName($user->lastname),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function save(User $user): void
    {
        $data = [
            'name'              => $user->name()->value(),
            'lastname'         => $user->lastname()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
            'remember_token'    => $user->rememberToken()->value(),
        ];

        $this->eloquentUserModel->create($data);
    }

    public function update(UserId $id, User $user): void
    {
        $data = [
            'name'  => $user->name()->value(),
            'email' => $user->email()->value(),
        ];

        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }
}

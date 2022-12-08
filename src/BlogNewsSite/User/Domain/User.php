<?php

declare(strict_types=1);

namespace Src\BlogNewsSite\User\Domain;

use src\BlogNewsSite\User\Domain\ValueObjects\UserEmail;
use src\BlogNewsSite\User\Domain\ValueObjects\UserEmailVerifiedDate;
use src\BlogNewsSite\User\Domain\ValueObjects\UserName;
use Src\BlogNewsSite\User\Domain\ValueObjects\LastName;
use src\BlogNewsSite\User\Domain\ValueObjects\UserPassword;
use src\BlogNewsSite\User\Domain\ValueObjects\UserRememberToken;

final class User
{
    private UserName $name;
    private LastName $lastname;
    private UserEmail $email;
    private UserEmailVerifiedDate $emailVerifiedDate;
    private UserPassword $password;
    private UserRememberToken $rememberToken;

    public function __construct(
        UserName $name,
        LastName $lastName,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    )
    {
        $this->name                 = $name;
        $this->lastname             = $lastName;
        $this->email                = $email;
        $this->emailVerifiedDate     = $emailVerifiedDate;
        $this->password             = $password;
        $this->rememberToken        = $rememberToken;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function lastname(): LastName
    {
        return $this->lastname;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function emailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function rememberToken(): UserRememberToken
    {
        return $this->rememberToken;
    }

    public static function create(
        UserName              $name,
        LastName              $lastName,
        UserEmail             $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword          $password,
        UserRememberToken     $rememberToken
    ): User
    {
        return new self($name, $lastName, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}

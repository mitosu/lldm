<?php

declare(strict_types=1);

namespace src\BlogNewsSite\User\Infrastructure;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;
use src\BlogNewsSite\User\Application\CreateUserUseCase;
use src\BlogNewsSite\User\Application\GetUserByCriteriaUseCase;
use src\BlogNewsSite\User\Infrastructure\Repositories\EloquentUserRepository;

final class CreateUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateUserRequest $request)
    {
        $userName              = $request->input('name');
        $userLastName          = $request->input('lastname');
        $userEmail             = $request->input('email');
        $userEmailVerifiedDate = null;
        $userPassword          = Hash::make($request->input('password'));
        $userRememberToken     = null;

        $createUserUseCase = new CreateUserUseCase($this->repository);
        $createUserUseCase->__invoke(
            $userName,
            $userLastName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        $newUser                  = $getUserByCriteriaUseCase->__invoke($userEmail);

        return $newUser;
    }
}

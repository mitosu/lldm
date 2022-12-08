<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BlogNewsSite\User\Application\GetUserByCriteriaUseCase;
use Src\BlogNewsSite\User\Infrastructure\Repositories\EloquentUserRepository;

final class GetUserByCriteriaController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userName  = $request->input('name');
        $userEmail = $request->input('email');

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        $user                     = $getUserByCriteriaUseCase->__invoke($userName, $userEmail);

        return $user;
    }
}

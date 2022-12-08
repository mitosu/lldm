<?php

declare(strict_types=1);

namespace Src\BlogNewsSite\User\Domain\ValueObjects;

final class LastName
{
    private $value;

    public function __construct(string $lastname)
    {
        $this->value = $lastname;
    }

    public function value(): string
    {
        return $this->value;
    }
}

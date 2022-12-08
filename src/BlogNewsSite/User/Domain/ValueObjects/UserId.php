<?php

declare(strict_types=1);

namespace Src\BlogNewsSite\User\Domain\ValueObjects;

use InvalidArgumentException;

final class UserId
{
    private int $value;

    /**
     * UserId constructor.
     * @param int $id
     * @throws InvalidArgumentException
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    /**
     * @param int $id
     * @throws InvalidArgumentException
     */
    private function validate(int $id): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($id, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', __CLASS__, $id)
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }

}

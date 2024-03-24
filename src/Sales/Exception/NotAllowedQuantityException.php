<?php

namespace khoul\Sales\Exception;

final class NotAllowedQuantityException extends \RuntimeException
{
    public function __construct(int $value)
    {
        parent::__construct(
            sprintf(
                'Cart item with negative quantity is not allowed. [%d] given.',
                $value
            )
        );
    }
}
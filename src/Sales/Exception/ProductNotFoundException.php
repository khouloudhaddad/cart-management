<?php
declare(strict_types=1);
namespace khoul\Sales\Exception;

class ProductNotFoundException extends \RuntimeException
{
    public function __construct(string $sku)
    {
        parent::__construct(
            sprintf(
                'Product with sku [%s] does not exist.',
                $sku
            )
        );
    }
}
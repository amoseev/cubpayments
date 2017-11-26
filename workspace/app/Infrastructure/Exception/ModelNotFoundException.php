<?php
declare(strict_types=1);

namespace Infrastructure\Exception;

class ModelNotFoundException extends \Exception
{

    public static function forClassId(string $class, $id)
    {
        return new static(sprintf('Model<%s> with id<%s> not found ', $class, $id));
    }
}
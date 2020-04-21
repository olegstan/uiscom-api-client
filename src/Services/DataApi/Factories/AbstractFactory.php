<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Factories;

abstract class AbstractFactory
{
    abstract public function fromArray(array $data);
}

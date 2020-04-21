<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Filters;

abstract class AbstractFilter
{
    abstract function toArray(): array;
}

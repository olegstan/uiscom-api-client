<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Contracts;

interface EndpointInterface
{
    public function getEndpointName(): string;

    public function make(): array;
}

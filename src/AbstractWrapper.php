<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

abstract class AbstractWrapper
{
    protected $apiVersion;

    protected $apiSession;

    abstract public function getApiUrl(): string;
}

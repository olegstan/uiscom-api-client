<?php
declare(strict_types=1);

namespace CBH\UiscomClient\CallApi;

use CBH\UiscomClient\AbstractWrapper;
use CBH\UiscomClient\CallApi\Endpoints\CallCreation\StartSimpleCall;
use CBH\UiscomClient\Constants;

/**
 * Class Wrapper
 */
class Wrapper extends AbstractWrapper
{
    private $startSimpleCall;

    public function __construct()
    {
        $this->startSimpleCall = new StartSimpleCall();
    }

    public function getApiUrl(): string
    {
        return Constants::CALL_API_URL;
    }

    public function startSimpleCall(): StartSimpleCall
    {
        return $this->startSimpleCall;
    }
}

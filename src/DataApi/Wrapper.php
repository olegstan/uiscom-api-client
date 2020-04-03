<?php
declare(strict_types=1);

namespace CBH\UiscomClient\DataApi;

use CBH\UiscomClient\AbstractWrapper;
use CBH\UiscomClient\Constants;

class Wrapper extends AbstractWrapper
{
    public function getApiUrl(): string
    {
        return Constants::DATA_API_URL;
    }
}

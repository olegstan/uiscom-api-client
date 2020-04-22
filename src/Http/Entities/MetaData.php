<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http\Entities;

class MetaData
{
    /* @var array */
    private $apiVersionInfo = [];

    /* @var array */
    private $limits = [];

    /* @var null|int */
    private $totalItems;

    public function __construct(array $metadata)
    {
        if (isset($metadata['api_version'])) {
            $this->apiVersionInfo = $metadata['api_version'];
        }

        if (isset($metadata['limits'])) {
            $this->limits = $metadata['limits'];
        }

        if (isset($metadata['total_items'])) {
            $this->totalItems = $metadata['total_items'];
        }
    }

    /**
     * @return array
     */
    public function getApiVersionInfo(): array
    {
        return $this->apiVersionInfo;
    }

    /**
     * @return array
     */
    public function getLimits(): array
    {
        return $this->limits;
    }

    /**
     * @return null|int
     */
    public function getTotalItems(): ?int
    {
        return $this->totalItems;
    }
}

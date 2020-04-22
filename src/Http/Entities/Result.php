<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http\Entities;

class Result
{
    /* @var array */
    private $data = [];

    /* @var null|MetaData */
    private $metadata;

    public function __construct(array $result)
    {
        if (isset($result['data'])) {
            $this->data = $result['data'];
        }

        if (isset($result['metadata'])) {
            $this->metadata = new MetaData($result['metadata']);
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return MetaData|null
     */
    public function getMetadata(): ?MetaData
    {
        return $this->metadata;
    }
}

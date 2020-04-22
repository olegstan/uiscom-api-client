<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http\Entities;

class Error
{
    /* @var null|string */
    private $message;

    /* @var null|int */
    private $code;

    /* @var array */
    private $data = [];

    public function __construct(array $error)
    {
        if (isset($error['message'])) {
            $this->message = $error['message'];
        }

        if (isset($error['code'])) {
            $this->code = (int) $error['code'];
        }

        if (isset($error['data'])) {
            $this->data = $error['data'];
        }
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return null|int
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}

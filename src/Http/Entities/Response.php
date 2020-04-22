<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http\Entities;

use CBH\UiscomClient\Exceptions\RequestException;

class Response
{
    /* @var array */
    private $responseContent;

    /* @var string */
    private $jsonRPCVer;

    /* @var int */
    private $requestId;

    /* @var null|Result */
    private $result;

    /* @var null|Error */
    private $error;

    /* @var bool */
    private $isError = false;

    /**
     * Response constructor.
     *
     * @param array $content
     *
     * @throws RequestException
     */
    public function __construct(array $content)
    {
        $this->responseContent = $content;

        if (isset($content['jsonrpc'])) {
            $this->jsonRPCVer = $content['jsonrpc'];
        }

        if (isset($content['id'])) {
            $this->requestId = (int) $content['id'];
        }

        if (!array_key_exists('result', $content) && !array_key_exists('error', $content)) {
            throw new RequestException('Bad response, because "result" or "error" keys not found');
        }

        if (array_key_exists('result', $content)) {
            $this->isError = false;
            $this->result = new Result($content['result']);
        }

        if (array_key_exists('error', $content)) {
            $this->isError = true;
            $this->error = new Error($content['error']);
        }
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     * @return string
     */
    public function getJsonRPCVer(): string
    {
        return $this->jsonRPCVer;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @return Result|null
     */
    public function getResult(): ?Result
    {
        return $this->result;
    }

    /**
     * @return Error|null
     */
    public function getError(): ?Error
    {
        return $this->error;
    }
}

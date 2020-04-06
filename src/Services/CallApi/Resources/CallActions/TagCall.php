<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Resources\CallActions;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Services\CallApi\Resources\AbstractCallApiResource;
use CBH\UiscomClient\Services\CallApi\Entities;

class TagCall extends AbstractCallApiResource
{
    /**
     * @var Entities\CallSession
     */
    private $callSession;

    /**
     * @var int
     */
    private $tagId;

    /**
     * TagCall constructor.
     *
     * @param Entities\CallSession $callSession
     * @param int $tagId
     */
    public function __construct(Entities\CallSession $callSession, int $tagId)
    {
        $this->callSession = $callSession;
        $this->tagId = $tagId;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::CALL_API_TAG_CALL_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::CALL_API_TAG_CALL_METHOD;
    }

    /**
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        return [
            'call_session_id' => $this->callSession->callSessionId,
            'tag_id' => $this->tagId,
        ];
    }

    /**
     * @throws ResourceException
     * @throws \CBH\UiscomClient\Exceptions\ApiException
     * @throws \CBH\UiscomClient\Exceptions\RequestException
     *
     * @return Entities\OperationResult
     */
    public function execute(): Entities\OperationResult
    {
        $response = $this->requester->execute($this);

        if (!isset($response['data']['success'])) {
            throw new ResourceException('Missing parameter success');
        }

        $operationResult = new Entities\OperationResult();
        $operationResult->success = $response['data']['success'];

        return $operationResult;
    }
}

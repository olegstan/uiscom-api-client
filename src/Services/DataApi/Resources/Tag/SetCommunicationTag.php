<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Tag;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Exceptions\ApiException;
use CBH\UiscomClient\Exceptions\RequestException;
use CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource;

class SetCommunicationTag extends AbstractDataApiResource
{
    /**
     * @var
     */
    private $userId;

    /**
     * @var int
     */
    private $communicationId;

    /**
     * @var string
     */
    private $communicationType;

    /**
     * @var int
     */
    private $tagId;

    /**
     * SetCommunicationTag constructor.
     * @param int $communicationId
     * @param string $communicationType
     * @param int $tagId
     */
    public function __construct(int $communicationId, string $communicationType, int $tagId)
    {
        $this->communicationId = $communicationId;
        $this->communicationType = $communicationType;
        $this->tagId = $tagId;
    }

    /**
     * @param mixed $userId
     *
     * @return SetCommunicationTag
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param int $communicationId
     *
     * @return SetCommunicationTag
     */
    public function setCommunicationId(int $communicationId): SetCommunicationTag
    {
        $this->communicationId = $communicationId;
        return $this;
    }

    /**
     * @param string $communicationType
     *
     * @return SetCommunicationTag
     */
    public function setCommunicationType(string $communicationType): SetCommunicationTag
    {
        $this->communicationType = $communicationType;
        return $this;
    }

    /**
     * @param int $tagId
     *
     * @return SetCommunicationTag
     */
    public function setTagId(int $tagId): SetCommunicationTag
    {
        $this->tagId = $tagId;
        return $this;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_SET_COMMUNICATION_TAG_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_SET_COMMUNICATION_TAG_METHOD;
    }

    /**
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = [
            'communication_id' => $this->communicationId,
            'communication_type' => $this->communicationType,
            'tag_id' => $this->tagId,
        ];

        if (null !== $this->userId) {
            $params['user_id'] = $this->userId;
        }

        return $params;
    }

    /**
     * Выполнение запроса
     *
     * @throws ApiException
     * @throws RequestException
     *
     * @return bool
     */
    public function execute(): bool
    {
        $response = $this->requester->execute($this, false);

        return !$response->isError();
    }
}

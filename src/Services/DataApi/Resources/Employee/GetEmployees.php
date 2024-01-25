<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Report;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource;

/**
 * Class GetEmployees
 *
 * @method Entities\Call[] execute()
 */
class GetEmployees extends AbstractDataApiResource
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var bool
     */
    private $includeOngoingCalls = false;

    /**
     * @param int $userId
     * @return GetEmployees
     */
    public function setUserId(int $userId): GetEmployees
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): GetEmployees
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset): GetEmployees
    {
        $this->offset = $offset;
        return $this;
    }


    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_GET_EMPLOYEE_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_GET_EMPLOYEE_METHOD;
    }

    /**
     * @throws \CBH\UiscomClient\Exceptions\ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = [];

        if (null !== $this->userId) {
            $params['user_id'] = $this->userId;
        }

        if (null !== $this->limit) {
            $params['limit'] = $this->limit;
        }

        if (null !== $this->offset) {
            $params['offset'] = $this->offset;
        }

        return $params;
    }
}

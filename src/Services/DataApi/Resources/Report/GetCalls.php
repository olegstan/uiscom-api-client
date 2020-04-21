<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Report;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Factories;
use CBH\UiscomClient\Services\DataApi\Factories\AbstractFactory;

/**
 * Class GetCalls
 *
 * @method Entities\Call[] execute()
 */
class GetCalls extends AbstractReportResource
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $includeOngoingCalls = false;

    /**
     * @param int $userId
     * @return GetCalls
     */
    public function setUserId(int $userId): GetCalls
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return GetCalls
     */
    public function withOngoingCalls(): GetCalls
    {
        $this->includeOngoingCalls = true;
        return $this;
    }

    /**
     * @return GetCalls
     */
    public function withoutOngoingCalls(): GetCalls
    {
        $this->includeOngoingCalls = false;
        return $this;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_GET_CALLS_REPORT_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_GET_CALLS_REPORT_METHOD;
    }

    /**
     * @throws \CBH\UiscomClient\Exceptions\ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = parent::buildExtraParams();

        $params['include_ongoing_calls'] = $this->includeOngoingCalls;

        if (null !== $this->userId) {
            $params['user_id'] = $this->userId;
        }

        return $params;
    }

    protected function getEntityFactory(): AbstractFactory
    {
        return new Factories\Call();
    }
}

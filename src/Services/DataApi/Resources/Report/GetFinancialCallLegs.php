<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Report;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Factories;
use CBH\UiscomClient\Services\DataApi\Factories\AbstractFactory;

/**
 * Class GetFinancialCallLegs
 *
 * @method Entities\FinancialCallLeg[] execute()
 */
class GetFinancialCallLegs extends AbstractReportResource
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @param int $userId
     * @return GetFinancialCallLegs
     */
    public function setUserId(int $userId): GetFinancialCallLegs
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_GET_FIN_CALL_LEG_REPORT_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_GET_FIN_CALL_LEGS_REPORT_METHOD;
    }

    /**
     * @throws \CBH\UiscomClient\Exceptions\ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = parent::buildExtraParams();

        if (null !== $this->userId) {
            $params['user_id'] = $this->userId;
        }

        return $params;
    }

    protected function getEntityFactory(): AbstractFactory
    {
        return new Factories\FinancialCallLeg();
    }
}

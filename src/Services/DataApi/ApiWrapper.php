<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\AbstractApiWrapper;
use CBH\UiscomClient\Services\DataApi\Resources;

/**
 * Class ApiWrapper
 *
 * @method Resources\Account\GetAccount             getAccount(...$args)
 * @method Resources\Tag\SetCommunicationTag        setCommunicationTag(int $communicationId, string $communicationType, int $tagId)
 * @method Resources\Report\GetCalls                getCallsReport()
 * @method Resources\Report\GetFinancialCallLegs    getFinancialCallLegsReport()
 */
class ApiWrapper extends AbstractApiWrapper
{
    protected $resources = [
        Constants::DATA_API_GET_ACCOUNT_METHOD => Resources\Account\GetAccount::class,
        Constants::DATA_API_SET_COMMUNICATION_TAG_METHOD => Resources\Tag\SetCommunicationTag::class,
        Constants::DATA_API_GET_CALLS_REPORT_METHOD => Resources\Report\GetCalls::class,
        Constants::DATA_API_GET_FIN_CALL_LEGS_REPORT_METHOD => Resources\Report\GetFinancialCallLegs::class,
    ];

    public function getServiceName(): string
    {
        return Constants::DATA_API_URL;
    }
}

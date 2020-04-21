<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Factories;

use CBH\UiscomClient\Services\DataApi\Fields;
use CBH\UiscomClient\Services\DataApi\Entities;

class Call extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return Entities\Call
     */
    public function fromArray(array $data): Entities\Call
    {
        $call = new Entities\Call();

        if (isset($data[Fields\Call::CALL_SESSION_ID])) {
            $call->id = $data[Fields\Call::CALL_SESSION_ID];
        }

        if (isset($data[Fields\Call::START_TIME])) {
            $call->startTime = new \DateTime($data[Fields\Call::START_TIME]);
        }

        if (isset($data[Fields\Call::FINISH_TIME])) {
            $call->finishTime = new \DateTime($data[Fields\Call::FINISH_TIME]);
        }

        if (isset($data[Fields\Call::IS_LOST])) {
            $call->isLost = $data[Fields\Call::IS_LOST];
        }

        if (isset($data[Fields\Call::SALE_COST])) {
            $call->saleCost = $data[Fields\Call::SALE_COST];
        }

        if (isset($data[Fields\Call::COMMUNICATION_ID])) {
            $call->communicationId = $data[Fields\Call::COMMUNICATION_ID];
        }

        if (isset($data[Fields\Call::SOURCE])) {
            $call->source = $data[Fields\Call::SOURCE];
        }

        if (isset($data[Fields\Call::CALL_API_EXTERNAL_ID])) {
            $call->callApiExternalId = $data[Fields\Call::CALL_API_EXTERNAL_ID];
        }

        return $call;
    }
}

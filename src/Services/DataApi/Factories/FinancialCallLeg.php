<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Factories;

use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Fields;

class FinancialCallLeg extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return Entities\FinancialCallLeg
     */
    public function fromArray(array $data): Entities\FinancialCallLeg
    {
        $financialCallLeg = new Entities\FinancialCallLeg();

        if (isset($data[Fields\FinancialCallLeg::START_TIME])) {
            $financialCallLeg->startTime = new \DateTime($data[Fields\FinancialCallLeg::START_TIME]);
        }

        if (isset($data[Fields\FinancialCallLeg::CALL_SESSION_ID])) {
            $financialCallLeg->callSessionId = (int) $data[Fields\FinancialCallLeg::CALL_SESSION_ID];
        }

        if (isset($data[Fields\FinancialCallLeg::COST_PER_MINUTE])) {
            $financialCallLeg->costPerMinute = (float) $data[Fields\FinancialCallLeg::COST_PER_MINUTE];
        }

        if (isset($data[Fields\FinancialCallLeg::TOTAL_CHARGE])) {
            $financialCallLeg->totalCharge = (float) $data[Fields\FinancialCallLeg::TOTAL_CHARGE];
        }

        if (isset($data[Fields\FinancialCallLeg::BONUSES_CHARGE])) {
            $financialCallLeg->bonusesCharge = (float) $data[Fields\FinancialCallLeg::BONUSES_CHARGE];
        }

        return $financialCallLeg;
    }
}

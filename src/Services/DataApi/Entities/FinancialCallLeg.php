<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Entities;

class FinancialCallLeg
{
    /**
     * @var \DateTime
     */
    public $startTime;

    /**
     * @var int
     */
    public $callSessionId;

    /**
     * @var float
     */
    public $costPerMinute;

    /**
     * @var float
     */
    public $totalCharge;

    /**
     * @var float
     */
    public $bonusesCharge;
}

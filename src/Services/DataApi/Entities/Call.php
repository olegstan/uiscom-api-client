<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Entities;

class Call
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var \DateTime
     */
    public $startTime;

    /**
     * @var \DateTime
     */
    public $finishTime;

    /**
     * @var bool
     */
    public $isLost;

    /**
     * @var float
     */
    public $saleCost;

    /**
     * @var int
     */
    public $communicationId;

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $callApiExternalId;
}

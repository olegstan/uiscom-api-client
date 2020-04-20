<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Entities;

class OperatorPhone
{
    /**
     * @var string
     */
    public $number;

    /**
     * @var null|string
     */
    public $dtmfString;

    /**
     * @var null|string
     */
    public $sipTrunk;

    /**
     * @var null|string
     */
    public $confirmation;

    /**
     * @var null|int
     */
    public $dialingTimeout;

    /**
     * OperatorPhone constructor.
     *
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->number = $phoneNumber;
    }
}

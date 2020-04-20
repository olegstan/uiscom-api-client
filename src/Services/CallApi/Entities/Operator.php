<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Entities;

use CBH\UiscomClient\Exceptions\EntityException;

class Operator
{
    /**
     * @var OperatorPhone[]
     */
    public $phones = [];

    /**
     * @var int
     */
    public $dialingIncrement;

    /**
     * @var int
     */
    public $incrementalDialingTimeout;

    /**
     * @var int
     */
    public $linesStart = 1;

    /**
     * @var int
     */
    public $linesLimit = 10;

    /**
     * @param OperatorPhone $phone
     *
     * @throws EntityException
     *
     * @return Operator
     */
    public function addPhone(OperatorPhone $phone): Operator
    {
        if (empty($phone->number)) {
            throw new EntityException('Field \'number\' required in OperatorPhone entity');
        }

        $this->phones[] = $phone;

        return $this;
    }
}

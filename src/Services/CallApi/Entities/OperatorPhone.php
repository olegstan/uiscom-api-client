<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Entities;

use CBH\UiscomClient\Exceptions\EntityException;

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
     * @var null|array
     */
    public $confirmationMessages = [];

    /**
     * OperatorPhone constructor.
     *
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->number = $phoneNumber;
    }

    /**
     *
     * @param ConfirmationMessage $confirmationMessage
     * @return OperatorPhone
     * @throws EntityException
     */
    public function addConfirmationMessage(ConfirmationMessage $confirmationMessage) : OperatorPhone {

        if (empty($confirmationMessage->type)) {
            throw new EntityException('Field \'type\' required in ConfirmationMessage entity');
        }

        if (empty($confirmationMessage->type)) {
            throw new EntityException('Field \'value\' required in ConfirmationMessage entity');
        }

        $this->confirmationMessages[] = $confirmationMessage;

        return $this;
    }
}

<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Resources\CallCreation;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Exceptions\EntityException;
use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Services\CallApi\Resources\AbstractCallApiResource;
use CBH\UiscomClient\Services\CallApi\Entities;

class StartMultiCall extends AbstractCallApiResource
{
    /**
     * @var string - кому первому звоним (operator или contact)
     */
    private $firstCall = Constants::CLIENT_OPERATOR;

    /**
     * @var bool
     */
    private $switchAtOnce = false;

    /**
     * @var bool
     */
    private $earlySwitching = false;

    /**
     * @var int
     */
    private $mediaFileId;

    /**
     * @var string
     */
    private $virtualPhoneNumber;

    /**
     * @var bool
     */
    private $showVirtualPhoneNumber = false;

    /**
     * @var bool
     */
    private $contactShowVirtualPhoneNumber = true;

    /**
     * @var string
     */
    private $contactPhone;

    /**
     * @var string
     */
    private $contactCallerNumber;

    /**
     * @var int
     */
    private $contactDialingTimeout;

    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var Entities\OperatorMessage
     */
    private $operatorMessage;

    /**
     * @var Entities\ContactMessage
     */
    private $contactMessage;

    /**
     * @var Entities\Operator[]
     */
    private $operators = [];

    /**
     * Звонок сначала оператору - затем посетителю
     *
     * @return StartMultiCall
     */
    public function setOperatorFirst(): StartMultiCall
    {
        $this->firstCall = Constants::CLIENT_OPERATOR;

        return $this;
    }

    /**
     * Звонок сначала посетителю - затем оператору
     *
     * @return StartMultiCall
     */
    public function setContactFirst(): StartMultiCall
    {
        $this->firstCall = Constants::SITE_VISITOR;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function enableSwitchAtOnce(): StartMultiCall
    {
        $this->switchAtOnce = true;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function disableSwitchAtOnce(): StartMultiCall
    {
        $this->switchAtOnce = false;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function enableEarlySwitching(): StartMultiCall
    {
        $this->earlySwitching = true;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function disableEarlySwitching(): StartMultiCall
    {
        $this->earlySwitching = false;

        return $this;
    }

    /**
     * @param int $mediaFileId
     *
     * @return StartMultiCall
     */
    public function setMediaFileId(int $mediaFileId): StartMultiCall
    {
        $this->mediaFileId = $mediaFileId;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return StartMultiCall
     */
    public function setVirtualPhoneNumber(string $phone): StartMultiCall
    {
        $this->virtualPhoneNumber = $phone;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function showVirtualPhoneNumberForOperator(): StartMultiCall
    {
        $this->showVirtualPhoneNumber = true;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function showRealPhoneNumberForOperator(): StartMultiCall
    {
        $this->showVirtualPhoneNumber = false;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function showVirtualPhoneNumberForContact(): StartMultiCall
    {
        $this->contactShowVirtualPhoneNumber = true;

        return $this;
    }

    /**
     * @return StartMultiCall
     */
    public function showRealPhoneNumberForContact(): StartMultiCall
    {
        $this->contactShowVirtualPhoneNumber = false;

        return $this;
    }

    /**
     * @param string $contactPhone
     * @return StartMultiCall
     */
    public function setContactPhone(string $contactPhone): StartMultiCall
    {
        $this->contactPhone = $contactPhone;
        return $this;
    }

    /**
     * @param string $contactCallerNumber
     * @return StartMultiCall
     */
    public function setContactCallerNumber(string $contactCallerNumber): StartMultiCall
    {
        $this->contactCallerNumber = $contactCallerNumber;
        return $this;
    }

    /**
     * @param int $contactDialingTimeout
     * @return StartMultiCall
     */
    public function setContactDialingTimeout(int $contactDialingTimeout): StartMultiCall
    {
        $this->contactDialingTimeout = $contactDialingTimeout;
        return $this;
    }

    /**
     * @param string $externalId
     * @return StartMultiCall
     */
    public function setExternalId(string $externalId): StartMultiCall
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @param string $direction
     * @return StartMultiCall
     */
    public function setDirection(string $direction): StartMultiCall
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @param Entities\OperatorMessage $operatorMessage
     * @return StartMultiCall
     */
    public function setOperatorMessage(Entities\OperatorMessage $operatorMessage): StartMultiCall
    {
        $this->operatorMessage = $operatorMessage;
        return $this;
    }

    /**
     * @param string $type
     *
     * @return StartMultiCall
     */
    public function setOperatorMessageType(string $type): StartMultiCall
    {
        if (null === $this->operatorMessage) {
            $this->operatorMessage = new Entities\OperatorMessage();
        }

        $this->operatorMessage->type = $type;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return StartMultiCall
     */
    public function setOperatorMessageValue(string $value): StartMultiCall
    {
        if (null === $this->operatorMessage) {
            $this->operatorMessage = new Entities\OperatorMessage();
        }

        $this->operatorMessage->value = $value;

        return $this;
    }

    /**
     * @param Entities\ContactMessage $contactMessage
     * @return StartMultiCall
     */
    public function setContactMessage(Entities\ContactMessage $contactMessage): StartMultiCall
    {
        $this->contactMessage = $contactMessage;
        return $this;
    }

    /**
     * @param string $type
     *
     * @return StartMultiCall
     */
    public function setContactMessageType(string $type): StartMultiCall
    {
        if (null === $this->contactMessage) {
            $this->contactMessage = new Entities\ContactMessage();
        }

        $this->contactMessage->type = $type;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return StartMultiCall
     */
    public function setContactMessageValue(string $value): StartMultiCall
    {
        if (null === $this->contactMessage) {
            $this->contactMessage = new Entities\ContactMessage();
        }

        $this->contactMessage->value = $value;

        return $this;
    }

    /**
     * @param Entities\Operator $operator
     * @return StartMultiCall
     * @throws EntityException
     */
    public function addOperator(Entities\Operator $operator): StartMultiCall
    {
        if (empty($operator->phones)) {
            throw new EntityException('Array of operator phones cannot be an empty');
        }

        $this->operators[] = $operator;

        return $this;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::CALL_API_START_SIMPLE_CALL_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::CALL_API_START_MULTI_CALL_METHOD;
    }

    /**
     * @throws ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        if (null === $this->virtualPhoneNumber) {
            throw new ResourceException('Parameter "virtual_phone_number" is required');
        }

        if (null === $this->contactPhone) {
            throw new ResourceException('Contact phone is required');
        }

        if (empty($this->operators)) {
            throw new ResourceException('Operators is required');
        }

        $params = [
            'first_call' => $this->firstCall,
            'virtual_phone_number' => $this->virtualPhoneNumber,
            'contact' => $this->contactPhone,
            'operators' => [],
            'switch_at_once' => $this->switchAtOnce,
            'early_switching' => $this->earlySwitching,
            'show_virtual_phone_number' => $this->showVirtualPhoneNumber,
            'contact_show_virtual_phone_number' => $this->contactShowVirtualPhoneNumber,
        ];

        if (null !== $this->contactCallerNumber) {
            $params['contact_caller_number'] = $this->contactCallerNumber;
        }

        if (null !== $this->contactDialingTimeout) {
            $params['contact_dialing_timeout'] = $this->contactDialingTimeout;
        }

        foreach ($this->operators as $operatorItem) {
            $operator = [
                'phones' => [],
            ];

            $operator['lines_start'] = $operatorItem->linesStart;
            $operator['lines_limit'] = $operatorItem->linesLimit;

            if (null !== $operatorItem->dialingIncrement) {
                $operator['dialing_increment'] = $operatorItem->dialingIncrement;
            }

            if (null !== $operatorItem->incrementalDialingTimeout) {
                $operator['incremental_dialing_timeout'] = $operatorItem->incrementalDialingTimeout;
            }

            foreach ($operatorItem->phones as $operatorPhone) {
                $phone = [];

                $phone['number'] = $operatorPhone->number;

                if (null !== $operatorPhone->confirmation) {
                    $phone['confirmation'] = $operatorPhone->confirmation;
                }

                if (null !== $operatorPhone->dialingTimeout) {
                    $phone['dialing_timeout'] = $operatorPhone->dialingTimeout;
                }

                if (null !== $operatorPhone->dtmfString) {
                    $phone['dtmf_string'] = $operatorPhone->dtmfString;
                }

                if (null !== $operatorPhone->sipTrunk) {
                    $phone['sip_trunk'] = $operatorPhone->sipTrunk;
                }

                $operator['phones'][] = $phone;
            }

            $params['operators'][] = $operator;
        }

        if (null !== $this->mediaFileId) {
            $params['media_file_id'] = $this->mediaFileId;
        }

        if (null !== $this->externalId) {
            $params['external_id'] = $this->externalId;
        }

        if (null !== $this->direction) {
            $params['direction'] = $this->direction;
        }

        if (null !== $this->contactMessage && null !== $this->contactMessage->type && null !== $this->contactMessage->value) {
            $params['contact_message'] = [
                'type' => $this->contactMessage->type,
                'value' => $this->contactMessage->value,
            ];
        }

        if (null !== $this->operatorMessage && null !== $this->operatorMessage->type && null !== $this->operatorMessage->value) {
            $params['operator_message'] = [
                'type' => $this->operatorMessage->type,
                'value' => $this->operatorMessage->value,
            ];
        }

        return $params;
    }

    /**
     * @throws ResourceException
     * @throws \CBH\UiscomClient\Exceptions\ApiException
     * @throws \CBH\UiscomClient\Exceptions\RequestException
     *
     * @return Entities\CallSession
     */
    public function execute(): Entities\CallSession
    {
        $response = $this->requester->execute($this);

        if (!isset($response['data']['call_session_id'])) {
            throw new ResourceException('Missing call session id');
        }

        $callSession = new Entities\CallSession();
        $callSession->callSessionId = $response['data']['call_session_id'];

        return $callSession;
    }
}

<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Resources\CallCreation;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Services\CallApi\Entities;
use CBH\UiscomClient\Services\CallApi\Resources\AbstractCallApiResource;

/**
 * Class StartSimpleCall
 * https://comagic.github.io/call-api/#start.simple_call
 */
class StartSimpleCall extends AbstractCallApiResource
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
     * @var string
     */
    private $contactPhone;

    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $dtmf;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var string
     */
    private $operatorPhone;

    /**
     * @var string
     */
    private $operatorConfirmation;

    /**
     * @var Entities\OperatorMessage
     */
    private $operatorMessage;

    /**
     * @var Entities\ContactMessage
     */
    private $contactMessage;

    public function __construct(array $params = [])
    {
        if (count($params) > 0) {
            if (array_key_exists('first_call', $params)) {
                $this->firstCall = $params['first_call'];
            }

            if (array_key_exists('switch_at_once', $params)) {
                $this->switchAtOnce = $params['switch_at_once'];
            }

            if (array_key_exists('early_switching', $params)) {
                $this->earlySwitching = $params['early_switching'];
            }
        }
    }

    /**
     * Звонок сначала оператору - затем посетителю
     *
     * @return StartSimpleCall
     */
    public function setOperatorFirst(): StartSimpleCall
    {
        $this->firstCall = Constants::CLIENT_OPERATOR;

        return $this;
    }

    /**
     * Звонок сначала посетителю - затем оператору
     *
     * @return StartSimpleCall
     */
    public function setContactFirst(): StartSimpleCall
    {
        $this->firstCall = Constants::SITE_VISITOR;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function enableSwitchAtOnce(): StartSimpleCall
    {
        $this->switchAtOnce = true;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function disableSwitchAtOnce(): StartSimpleCall
    {
        $this->switchAtOnce = false;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function enableEarlySwitching(): StartSimpleCall
    {
        $this->earlySwitching = true;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function disableEarlySwitching(): StartSimpleCall
    {
        $this->earlySwitching = false;

        return $this;
    }

    /**
     * @param int $mediaFileId
     *
     * @return StartSimpleCall
     */
    public function setMediaFileId(int $mediaFileId): StartSimpleCall
    {
        $this->mediaFileId = $mediaFileId;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return StartSimpleCall
     */
    public function setVirtualPhoneNumber(string $phone): StartSimpleCall
    {
        $this->virtualPhoneNumber = $phone;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function showVirtualPhoneNumber(): StartSimpleCall
    {
        $this->showVirtualPhoneNumber = true;

        return $this;
    }

    /**
     * @return StartSimpleCall
     */
    public function showRealPhoneNumber(): StartSimpleCall
    {
        $this->showVirtualPhoneNumber = false;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return StartSimpleCall
     */
    public function setContactPhoneNumber(string $phone): StartSimpleCall
    {
        $this->contactPhone = $phone;

        return $this;
    }

    /**
     * @param string $externalId
     *
     * @return StartSimpleCall
     */
    public function setExternalId(string $externalId): StartSimpleCall
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param string $dtmf
     *
     * @return StartSimpleCall
     */
    public function setDTMF(string $dtmf): StartSimpleCall
    {
        $this->dtmf = $dtmf;

        return $this;
    }

    /**
     * @param string $direction
     *
     * @return StartSimpleCall
     */
    public function setDirection(string $direction): StartSimpleCall
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return StartSimpleCall
     */
    public function setOperatorPhoneNumber(string $phone): StartSimpleCall
    {
        $this->operatorPhone = $phone;

        return $this;
    }

    /**
     * @param string $confirmation
     *
     * @return StartSimpleCall
     */
    public function setOperatorConfirmation(string $confirmation): StartSimpleCall
    {
        $this->operatorConfirmation = $confirmation;

        return $this;
    }

    /**
     * @param Entities\ContactMessage $contactMessage
     *
     * @return StartSimpleCall
     */
    public function setContactMessage(Entities\ContactMessage $contactMessage): StartSimpleCall
    {
        $this->contactMessage = $contactMessage;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return StartSimpleCall
     */
    public function setContactMessageType(string $type): StartSimpleCall
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
     * @return StartSimpleCall
     */
    public function setContactMessageValue(string $value): StartSimpleCall
    {
        if (null === $this->contactMessage) {
            $this->contactMessage = new Entities\ContactMessage();
        }

        $this->contactMessage->value = $value;

        return $this;
    }

    /**
     * @param Entities\OperatorMessage $operatorMessage
     *
     * @return StartSimpleCall
     */
    public function setOperatorMessage(Entities\OperatorMessage $operatorMessage): StartSimpleCall
    {
        $this->operatorMessage = $operatorMessage;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return StartSimpleCall
     */
    public function setOperatorMessageType(string $type): StartSimpleCall
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
     * @return StartSimpleCall
     */
    public function setOperatorMessageValue(string $value): StartSimpleCall
    {
        if (null === $this->operatorMessage) {
            $this->operatorMessage = new Entities\OperatorMessage();
        }

        $this->operatorMessage->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::CALL_API_START_SIMPLE_CALL_RESOURCE;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::CALL_API_START_SIMPLE_CALL_METHOD;
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

        if (null === $this->operatorPhone) {
            throw new ResourceException('Operator phone is required');
        }

        $params = [
            'first_call' => $this->firstCall,
            'virtual_phone_number' => $this->virtualPhoneNumber,
            'contact' => $this->contactPhone,
            'operator' => $this->operatorPhone,
            'switch_at_once' => $this->switchAtOnce,
            'early_switching' => $this->earlySwitching,
            'show_virtual_phone_number' => $this->showVirtualPhoneNumber,
        ];

        if (null !== $this->mediaFileId) {
            $params['media_file_id'] = $this->mediaFileId;
        }

        if (null !== $this->externalId) {
            $params['external_id'] = $this->externalId;
        }

        if (null !== $this->dtmf) {
            $params['dtmf_string'] = $this->dtmf;
        }

        if (null !== $this->direction) {
            $params['direction'] = $this->direction;
        }

        if (null !== $this->operatorConfirmation) {
            $params['operator_confirmation'] = $this->operatorConfirmation;
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

        $data = $response->getResult()->getData();

        if (!isset($data['call_session_id'])) {
            throw new ResourceException('Missing call session id');
        }

        $callSession = new Entities\CallSession();
        $callSession->callSessionId = $data['call_session_id'];

        return $callSession;
    }
}

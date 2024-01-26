<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\CallApi\Resources\CallCreation;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Services\CallApi\Entities;
use CBH\UiscomClient\Services\CallApi\Resources\AbstractCallApiResource;

/**
 * Class StartEmployeeCall
 * @package CBH\UiscomClient\Services\CallApi\Resources\CallCreation
 *
 * https://www.uiscom.ru/academiya/spravochnyj-centr/dokumentatsiya-api/call_api/create_call/start_employee_call/
 */
class StartEmployeeCall extends StartSimpleCall
{
    /**
     * @var string - кому первому звоним (operator или contact)
     */
    protected $firstCall = Constants::EMPLOYEE;

    /**
     * @var
     */
    protected $employee;

    /**
     * Звонок сначала оператору - затем посетителю
     *
     * @return StartSimpleCall
     */
    public function setOperatorFirst()
    {
        $this->firstCall = Constants::EMPLOYEE;

        return $this;
    }

    /**
     * @param Entities\Employee $employee
     * @return $this
     */
    public function setEmployee(Entities\Employee $employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::CALL_API_START_EMPLOYEE_CALL_RESOURCE;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::CALL_API_START_EMPLOYEE_CALL_METHOD;
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

        $params = [
            'first_call' => $this->firstCall,
            'virtual_phone_number' => $this->virtualPhoneNumber,
            'contact' => $this->contactPhone,
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

        if (null !== $this->employee && null !== $this->employee->id) {
            $params['employee']['id'] = $this->employee->id;

            if(null !== $this->employee->phone_number)
            {
                $params['employee']['phone_number'] = $this->employee->phone_number;
            }
        }

        return $params;
    }
}

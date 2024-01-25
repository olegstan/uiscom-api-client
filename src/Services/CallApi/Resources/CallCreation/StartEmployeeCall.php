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
     * @var
     */
    protected $employee;

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
     * @throws ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = parent::buildParamsForRequest();

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

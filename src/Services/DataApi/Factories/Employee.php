<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Factories;

use CBH\UiscomClient\Services\DataApi\Factories\AbstractFactory;
use CBH\UiscomClient\Services\DataApi\Factories\ReportTag;
use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Fields;

class Employee extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return Entities\Employee
     */
    public function fromArray(array $data): Entities\Employee
    {
        $employee = new Entities\Employee();

        if (isset($data[Fields\Employee::USER_ID])) {
            $employee->id = $data[Fields\Employee::USER_ID];
        }
        if (isset($data[Fields\Employee::LOGIN])) {
            $employee->login = $data[Fields\Employee::LOGIN];
        }
        if (isset($data[Fields\Employee::FIRST_NAME])) {
            $employee->first_name = $data[Fields\Employee::FIRST_NAME];
        }
        if (isset($data[Fields\Employee::LAST_NAME])) {
            $employee->last_name = $data[Fields\Employee::LAST_NAME];
        }
        if (isset($data[Fields\Employee::PATRONYMIC])) {
            $employee->patronymic = $data[Fields\Employee::PATRONYMIC];
        }
        if (isset($data[Fields\Employee::FULL_NAME])) {
            $employee->full_name = $data[Fields\Employee::FULL_NAME];
        }
        if (isset($data[Fields\Employee::STATUS])) {
            $employee->status = $data[Fields\Employee::STATUS];
        }
        if (isset($data[Fields\Employee::STATUS_ID])) {
            $employee->status_id = $data[Fields\Employee::STATUS_ID];
        }
        if (isset($data[Fields\Employee::CALLS_AVAILABLE])) {
            $employee->calls_available = $data[Fields\Employee::CALLS_AVAILABLE];
        }
//        if (isset($data[Fields\Employee::IN_EXTERNAL_ALLOWED_CALL_DIRECTIONS])) {
//            $employee->in_external_allowed_call_directions = $data[Fields\Employee::IN_EXTERNAL_ALLOWED_CALL_DIRECTIONS];
//        }
//        if (isset($data[Fields\Employee::IN_INTERNAL_ALLOWED_CALL_DIRECTIONS])) {
//            $employee->in_internal_allowed_call_directions = $data[Fields\Employee::IN_INTERNAL_ALLOWED_CALL_DIRECTIONS];
//        }
//        if (isset($data[Fields\Employee::ALLOWED_OUT_CALL_TYPES])) {
//            $employee->allowed_out_call_types = $data[Fields\Employee::ALLOWED_OUT_CALL_TYPES];
//        }
//        if (isset($data[Fields\Employee::OUT_EXTERNAL_ALLOWED_CALL_DIRECTIONS])) {
//            $employee->out_external_allowed_call_directions = $data[Fields\Employee::OUT_EXTERNAL_ALLOWED_CALL_DIRECTIONS];
//        }
//        if (isset($data[Fields\Employee::OUT_INTERNAL_ALLOWED_CALL_DIRECTIONS])) {
//            $employee->out_internal_allowed_call_directions = $data[Fields\Employee::OUT_INTERNAL_ALLOWED_CALL_DIRECTIONS];
//        }
        if (isset($data[Fields\Employee::EMAIL])) {
            $employee->email = $data[Fields\Employee::EMAIL];
        }
        if (isset($data[Fields\Employee::CALL_RECORDING])) {
            $employee->call_recording = $data[Fields\Employee::CALL_RECORDING];
        }
        if (isset($data[Fields\Employee::SCHEDULE_ID])) {
            $employee->schedule_id = $data[Fields\Employee::SCHEDULE_ID];
        }
        if (isset($data[Fields\Employee::SCHEDULE_NAME])) {
            $employee->schedule_name = $data[Fields\Employee::SCHEDULE_NAME];
        }

        return $employee;
    }
}

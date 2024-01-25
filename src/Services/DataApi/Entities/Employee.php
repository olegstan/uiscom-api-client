<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Entities;

use CBH\UiscomClient\Services\DataApi\Factories\AbstractFactory;
use CBH\UiscomClient\Services\DataApi\Factories\ReportTag;

class Employee
{
    public $id;

    public $login;

    public $first_name;

    public $last_name;

    public $patronymic;

    public $full_name;

    public $status;

    public $status_id;

    public $calls_available;

    public $in_external_allowed_call_directions;

    public $in_internal_allowed_call_directions;

    public $allowed_out_call_types;

    public $out_external_allowed_call_directions;

    public $out_internal_allowed_call_directions;

    public $email;

    public $call_recording;

    public $schedule_id;

    public $schedule_name;
}

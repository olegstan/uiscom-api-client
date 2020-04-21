<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Entities;

class ReportTag
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var \DateTime
     */
    public $changeTime;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $userId;

    /**
     * @var string
     */
    public $userLogin;

    /**
     * @var int
     */
    public $employeeId;

    /**
     * @var string
     */
    public $employeeFullName;
}

<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Factories;

use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Fields;

class ReportTag extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return Entities\ReportTag
     */
    public function fromArray(array $data): Entities\ReportTag
    {
        $tag = new Entities\ReportTag();

        if (isset($data[Fields\ReportTag::TAG_ID])) {
            $tag->id = (int) $data[Fields\ReportTag::TAG_ID];
        }

        if (isset($data[Fields\ReportTag::TAG_NAME])) {
            $tag->name = $data[Fields\ReportTag::TAG_NAME];
        }

        if (isset($data[Fields\ReportTag::TAG_CHANGE_TIME])) {
            $tag->changeTime = new \DateTime($data[Fields\ReportTag::TAG_CHANGE_TIME]);
        }

        if (isset($data[Fields\ReportTag::TAG_TYPE])) {
            $tag->type = $data[Fields\ReportTag::TAG_TYPE];
        }

        if (isset($data[Fields\ReportTag::TAG_USER_ID])) {
            $tag->userId = (int) $data[Fields\ReportTag::TAG_USER_ID];
        }

        if (isset($data[Fields\ReportTag::TAG_USER_LOGIN])) {
            $tag->userLogin = $data[Fields\ReportTag::TAG_USER_LOGIN];
        }

        if (isset($data[Fields\ReportTag::TAG_EMPLOYEE_ID])) {
            $tag->employeeId = (int) $data[Fields\ReportTag::TAG_EMPLOYEE_ID];
        }

        if (isset($data[Fields\ReportTag::TAG_EMPLOYEE_FULL_NAME])) {
            $tag->employeeFullName = $data[Fields\ReportTag::TAG_EMPLOYEE_FULL_NAME];
        }

        return $tag;
    }
}

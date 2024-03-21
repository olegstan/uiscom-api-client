<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Entities;

class Call
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var \DateTime
     */
    public $startTime;

    /**
     * @var \DateTime
     */
    public $finishTime;

    /**
     * @var bool
     */
    public $isLost;

    /**
     * @var float
     */
    public $saleCost;

    /**
     * @var int
     */
    public $communicationId;

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $direction;

    /**
     * @var string
     */
    public $callApiExternalId;

    /**
     * @var string
     */
    public $callPhoneNumber;

    /**
     * @var
     */
    public $callRecords;
    /**
     * @var
     */
    public $wavCallRecords;

    /**
     * @var ReportTag[]
     */
    public $tags = [];

    /**
     * Проверяет имеется ли у звонка тег с указанным идентификатором
     *
     * @param int $id
     *
     * @return bool
     */
    public function hasTagId(int $id): bool
    {
        if (count($this->tags) > 0) {
            foreach ($this->tags as $tag) {
                if ($tag->id === $id) {
                    return true;
                }
            }
        }

        return false;
    }
}

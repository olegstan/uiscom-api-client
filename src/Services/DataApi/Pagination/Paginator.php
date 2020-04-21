<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Pagination;

class Paginator
{
    private const MAX_LIMIT = 10000;

    private const MAX_OFFSET = 100000;

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $limit = 1000;

    public function __construct(int $limit = null, int $offset = null)
    {
        if (null !== $limit)
            $this->setLimit($limit);

        if (null !== $offset)
            $this->setOffset($offset);
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return Paginator
     */
    public function setOffset(int $offset): Paginator
    {
        $this->offset = ($offset > self::MAX_OFFSET) ? self::MAX_OFFSET : $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return Paginator
     */
    public function setLimit(int $limit): Paginator
    {
        $this->limit = ($limit > self::MAX_LIMIT) ? self::MAX_LIMIT : $limit;
        return $this;
    }

    /**
     * @return Paginator
     */
    public function nextPage(): Paginator
    {
        $this->setOffset($this->offset + $this->limit);

        return $this;
    }
}

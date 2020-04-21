<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Filters;

class FilterWrapper extends AbstractFilter
{
    public const OR_COND = 'or';

    public const AND_COND = 'and';

    /**
     * @var AbstractFilter[]
     */
    private $filters = [];

    /**
     * @var string
     */
    private $condition;

    public function __construct(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @param AbstractFilter $filter
     *
     * @return FilterWrapper
     */
    public function addFilter(AbstractFilter $filter): FilterWrapper
    {
        $this->filters[] = $filter;

        return $this;
    }

    public function toArray(): array
    {
        $filters = [];
        foreach ($this->filters as $abstractFilter) {
            $filters[] = $abstractFilter->toArray();
        }

        return [
            'filters' => $filters,
            'condition' => $this->condition,
        ];
    }
}

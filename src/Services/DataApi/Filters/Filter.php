<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Filters;

class Filter extends AbstractFilter
{
    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $operator;

    /**
     * @var string|int|float|bool
     */
    public $value;

    /**
     * Filter constructor.
     * @param string $field
     * @param string $operator
     * @param string|int|float|bool $value
     */
    public function __construct(string $field, string $operator, $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'operator' => $this->operator,
            'value' => $this->value,
        ];
    }
}

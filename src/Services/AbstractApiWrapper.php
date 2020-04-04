<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services;

use CBH\UiscomClient\Contracts\ResourceInterface;
use CBH\UiscomClient\Http\ApiRequest;

abstract class AbstractApiWrapper
{
    protected $requester;

    protected $resources = [];

    public function __construct(ApiRequest $requester)
    {
        $this->requester = $requester;
    }

    public function registerResource(ResourceInterface $resource): bool
    {
        return false;
    }

    public function __call($name, $arguments)
    {
        // Если ресурс уже зарегистрирован, — возвращаем экземпляр его класса
        if (in_array($name, $this->resources, true)) {
            $resource = new $this->resources[$name](...$arguments);
            return $resource;
        }

        // Иначе пытаемся найти и зарегистрировать
    }
}

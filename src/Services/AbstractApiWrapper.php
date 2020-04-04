<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services;

use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Exceptions\ServiceException;
use CBH\UiscomClient\Http\ApiRequest;

abstract class AbstractApiWrapper
{
    /**
     * @var ApiRequest
     */
    protected $requester;

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * AbstractApiWrapper constructor.
     *
     * @param ApiRequest $requester
     */
    public function __construct(ApiRequest $requester)
    {
        $this->requester = $requester;
    }

    /**
     * @return string
     */
    abstract public function getServiceName(): string;

    /**
     * @param $name
     * @param $arguments
     *
     * @throws ServiceException
     *
     * @return AbstractResource
     */
    public function __call($name, $arguments)
    {
        /* @var AbstractResource $resource */
        $resource = null;

        // Если ресурс уже зарегистрирован, — возвращаем экземпляр его класса
        if (array_key_exists($name, $this->resources)) {
            $resource = new $this->resources[$name](...$arguments);
        }

        // TODO Пока кидаем исключение
        if (null === $resource) {
            throw new ServiceException("Undefined method {$name} at {$this->getServiceName()} service");
        }

        $resource->setRequester($this->requester);

        return $resource;
    }

    /**
     * Регистрация нового ресурса
     *
     * @param AbstractResource $resource
     *
     * @throws ResourceException
     *
     * @param bool $force - если ресурс уже зарегистрирован и параметр $force равен true, то ресурс будет перезаписан
     */
    public function registerResource(AbstractResource $resource, bool $force = false): void
    {
        if (array_key_exists($resource->getMethodName(), $this->resources) && !$force) {
            throw new ResourceException("Resource {$resource->getResourceName()} already registered");
        }

        $this->resources[$resource->getMethodName()] = get_class($resource);
    }
}

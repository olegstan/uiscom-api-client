<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services;

use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Http\Requester;

abstract class AbstractResource
{
    /**
     * @var Requester
     */
    protected $requester;

    /**
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * @param Requester $requester
     *
     * @return AbstractResource
     */
    public function setRequester(Requester $requester): AbstractResource
    {
        $this->requester = $requester;

        return $this;
    }

    public function setConfig(ConfigurationInterface $configuration): AbstractResource
    {
        $this->config = $configuration;

        return $this;
    }

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    abstract public function getResourceName(): string;

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    abstract public function getMethodName(): string;

    /**
     * @return array
     */
    abstract public function buildParamsForRequest(): array;

    /**
     * @return string
     */
    abstract public function getServiceName(): string;

    /**
     * @return string
     */
    abstract public function getApiVersion(): string;

    /**
     * @return string
     */
    abstract public function getApiHost(): string;

    /**
     * Выполнение запроса
     *
     * @return mixed
     */
    abstract public function execute();
}

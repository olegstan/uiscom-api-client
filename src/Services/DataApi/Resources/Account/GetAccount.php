<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Account;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource;
use CBH\UiscomClient\Services\DataApi\Entities;

class GetAccount extends AbstractDataApiResource
{

    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_GET_ACCOUNT_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_GET_ACCOUNT_METHOD;
    }

    public function buildParamsForRequest(): array
    {
        return [];
    }

    /**
     * Выполнение запроса
     *
     * @throws \CBH\UiscomClient\Exceptions\ApiException
     * @throws \CBH\UiscomClient\Exceptions\RequestException
     *
     * @return Entities\Account
     */
    public function execute(): Entities\Account
    {
        $response = $this->requester->execute($this);

        $account = new Entities\Account();

        return $account;
    }
}

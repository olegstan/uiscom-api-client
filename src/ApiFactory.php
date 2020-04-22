<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Http\Requester;

class ApiFactory
{
    /**
     * Создает апи клиента с авторизацией по логину/паролю.
     *
     * @param string $login
     * @param string $password
     * @param ConfigurationInterface $configuration
     *
     * @return ApiClient
     */
    public static function makeApiClientWithCredentials(string $login, string $password, ConfigurationInterface $configuration): ApiClient
    {
        $configuration
            ->setLogin($login)
            ->setPassword($password)
            ->setAuthType(Constants::AUTH_BY_CREDENTIALS);

        return new ApiClient($configuration);
    }

    /**
     * Создает апи клиента с авторизацией по апи ключу.
     *
     * @param string $apiKey
     * @param ConfigurationInterface $configuration
     *
     * @return ApiClient
     */
    public static function makeApiClientWithApiKey(string $apiKey, ConfigurationInterface $configuration): ApiClient
    {
        $configuration
            ->setApiKey($apiKey)
            ->setAuthType(Constants::AUTH_BY_API_KEY);

        return new ApiClient($configuration);
    }
}

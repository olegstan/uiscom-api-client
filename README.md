#### Пример использования:

```php
use \CBH\UiscomClient\Configuration\Configuration;
use \CBH\UiscomClient\ApiFactory;

...

$httpClient = new GuzzleHttp\Client();
$config = new Configuration($httpClient);

// Если необходимо логировать работу клиента — можно передать объект,
// реализующий интерфейс Psr\Log\LoggerInterface
$logger = new Monolog\Logger('log_channel');
$config->setLogger($logger);

// Создаем api клиент
$apiClient = ApiFactory::makeApiClientWithApiKey('api_key', $config);

...

// Пример обращения к методу start.simple_call сервиса CallApi
// https://comagic.github.io/call-api/#start.simple_call
try {
    $call = $apiClient->callApi()->getSimpleCall();
    $call->setOperatorFirst();
    $call->setContactPhone('71111111111');
    $call->setOperatorPhone('72222222222');
    ...
    $callSessionEntity = $call->execute();
} catch (CBH\UiscomClient\Exceptions\BaseException $e) {
    ...
}
```

##### Можно передать параметры через конструктор
```php
$params = [
    'first_call' => 'operator',
    'contact'    => '71111111111',
    'operator'   => '72222222222',
    ...
];
try {
    $call = $apiClient->callApi()->getSimpleCall($params);
    $callSessionEntity = $call->execute();
} catch (CBH\UiscomClient\Exceptions\BaseException $e) {
    ...
}
```

#### Расширение клиента, собственной реализацией методов
На примере https://comagic.github.io/data-api/Account/
```php
class GetAccount extends CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource
{
    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return 'get.account';
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return 'getAccount';
    }

    public function buildParamsForRequest(): array
    {
        return [];
    }
}

...

$httpClient = new GuzzleHttp\Client();
$config = new Configuration($httpClient);
$apiClient = ApiFactory::makeApiClientWithApiKey('api_key', $config);

$apiClient->dataApi()->registerResource(new GetAccount());
```

####Пример использования:

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
$call = $apiClient->callApi()->getSimpleCall();
$call->setOperatorFirst();
$callSessionId = $call->run();
```

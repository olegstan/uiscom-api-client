<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

class Constants
{
    /* URL адреса API сервисов UIS */
    public const CALL_API_URL = 'https://callapi.uiscom.ru';

    public const DATA_API_URL = 'https://dataapi.uiscom.ru';

    /* Имена методов конечных точек соединения */
    public const CALL_API_METHOD_START_SIMPLE_CALL = 'start.simple_call';

    /* Обозначение посетителя и оператора в терминологии UIS */
    public const SITE_VISITOR = 'contact';

    public const CLIENT_OPERATOR = 'operator';

    /* Варианты авторизации в API */
    public const AUTH_BY_CREDENTIALS = 1;

    public const AUTH_BY_API_KEY = 2;
}

<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

class Constants
{
    /* Названия API сервисов */
    public const CALL_API_SERVICE = 'CallApi';

    public const DATA_API_SERVICE = 'DataApi';

    /* URL адреса API сервисов UIS */
    public const CALL_API_URL = 'https://callapi.uiscom.ru';

    public const DATA_API_URL = 'https://dataapi.uiscom.ru';

    /* Обозначение посетителя и оператора в терминологии UIS */
    public const SITE_VISITOR = 'contact';

    public const CLIENT_OPERATOR = 'operator';

    /* Варианты авторизации в API */
    public const AUTH_BY_CREDENTIALS = 1;

    public const AUTH_BY_API_KEY = 2;

    /* Версии API */
    public const CALL_API_VERSION_4 = 'v4.0';

    public const DATA_API_VERSION_2 = 'v2.0';

    /* Опции HTTP-запроса по умолчанию */
    public const USER_AGENT = 'CBH-Uiscom-Client';

    /* Названия конечных методов API */
    public const CALL_API_START_SIMPLE_CALL_RESOURCE = 'start.simple_call';

    public const CALL_API_START_MULTI_CALL_RESOURCE = 'start.multi_call';

    public const CALL_API_TAG_CALL_RESOURCE = 'tag.call';

    public const DATA_API_GET_ACCOUNT_RESOURCE = 'get.account';

    /* Названия методов ресурсов */
    public const CALL_API_START_SIMPLE_CALL_METHOD = 'getSimpleCall';

    public const CALL_API_START_MULTI_CALL_METHOD = 'getMultiCall';

    public const CALL_API_TAG_CALL_METHOD = 'setCallTag';

    public const DATA_API_GET_ACCOUNT_METHOD = 'getAccount';

    /* Типы медиа, проигрываемых каждому плечу */
    public const MESSAGE_TYPE_TTS = 'tts';

    public const MESSAGE_TYPE_MEDIA = 'media';
}

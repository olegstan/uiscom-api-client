<?php
declare(strict_types=1);

namespace CBH\UiscomClient;

class Constants
{
    /* Поставщики API */
    public const UIS = 'UIS';

    public const CALL_GEAR = 'CallGear';

    /* Названия API сервисов */
    public const CALL_API_SERVICE = 'CallApi';

    public const DATA_API_SERVICE = 'DataApi';

    /* URL адреса API сервисов UIS */
    public const UIS_CALL_API_HOST = 'https://callapi.uiscom.ru';

    public const UIS_DATA_API_HOST = 'https://dataapi.uiscom.ru';

    public const CALL_GEAR_CALL_API_HOST = 'https://callapi.callgear.com';

    public const CALL_GEAR_DATA_API_HOST = 'https://dataapi.callgear.com';

    public const API_HOSTS = [
        self::UIS => [
            self::CALL_API_SERVICE => self::UIS_CALL_API_HOST,
            self::DATA_API_SERVICE => self::UIS_DATA_API_HOST,
        ],
        self::CALL_GEAR => [
            self::CALL_API_SERVICE => self::CALL_GEAR_CALL_API_HOST,
            self::DATA_API_SERVICE => self::CALL_GEAR_DATA_API_HOST,
        ],
    ];

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

    public const CALL_API_START_EMPLOYEE_CALL_RESOURCE = 'start.employee_call';

    public const CALL_API_START_MULTI_CALL_RESOURCE = 'start.multi_call';

    public const CALL_API_TAG_CALL_RESOURCE = 'tag.call';

    public const DATA_API_GET_ACCOUNT_RESOURCE = 'get.account';

    public const DATA_API_GET_CALLS_REPORT_RESOURCE = 'get.calls_report';

    public const DATA_API_GET_FIN_CALL_LEG_REPORT_RESOURCE = 'get.financial_call_legs_report';

    public const DATA_API_SET_COMMUNICATION_TAG_RESOURCE = 'set.tag_communications';

    /* Названия методов ресурсов */
    public const CALL_API_START_SIMPLE_CALL_METHOD = 'getSimpleCall';

    public const CALL_API_START_EMPLOYEE_CALL_METHOD = 'getEmployeeCall';

    public const CALL_API_START_MULTI_CALL_METHOD = 'getMultiCall';

    public const CALL_API_TAG_CALL_METHOD = 'setCallTag';

    public const DATA_API_GET_ACCOUNT_METHOD = 'getAccount';

    public const DATA_API_GET_CALLS_REPORT_METHOD = 'getCallsReport';

    public const DATA_API_GET_FIN_CALL_LEGS_REPORT_METHOD = 'getFinancialCallLegsReport';

    public const DATA_API_SET_COMMUNICATION_TAG_METHOD = 'setCommunicationTag';

    /* Типы медиа, проигрываемых каждому плечу */
    public const MESSAGE_TYPE_TTS = 'tts';

    public const MESSAGE_TYPE_MEDIA = 'media';

    /* Типы обращений */
    public const COMMUNICATION_TYPE_CHAT = 'chat';

    public const COMMUNICATION_TYPE_CALL = 'call';

    public const COMMUNICATION_TYPE_GOAL = 'goal';

    public const COMMUNICATION_TYPE_OFFLINE_MESSAGE = 'offline_message';

    /* Источники звонка  */
    public const CALL_SOURCE_CALL_API = 'callapi';
}

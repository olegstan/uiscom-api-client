<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Exceptions\ApiException;
use CBH\UiscomClient\Exceptions\RequestException;
use CBH\UiscomClient\Http\Entities\Response;
use CBH\UiscomClient\Services\AbstractResource;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class Requester
{
    /**
     * @var ConfigurationInterface
     */
    private $config;

    /**
     * Requester constructor.
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }

    /**
     * @param AbstractResource $resource
     *
     * @param bool $exceptionOnResponseError генерировать исключение, если в ответе вернулась ошибка (ключ error)
     *
     * @throws ApiException
     * @throws RequestException
     *
     * @return Response
     */
    public function execute(AbstractResource $resource, bool $exceptionOnResponseError = true): Response
    {
        $headers = [
            'User-Agent' => Constants::USER_AGENT,
        ];

        $url = "{$resource->getApiHost()}/{$resource->getApiVersion()}";

        $accessToken = $this->getAccessToken();

        $params = $resource->buildParamsForRequest();
        $params['access_token'] = $accessToken;

        $requestParams = [
            'jsonrpc' => '2.0',
            'id' => mt_rand(1, 9999),
            'method' => $resource->getResourceName(),
            'params' => $params,
        ];

        try {
            $response = $this->config->getHttpClient()->request('POST', $url, [
                RequestOptions::HEADERS => $headers,
                RequestOptions::JSON => $requestParams,
            ]);
        } catch (GuzzleException $e) {
            throw new RequestException('HTTP client error', 0, $e);
        } catch (\Exception $e) {
            throw new RequestException('Critical error', 0, $e);
        }

        if (200 !== $response->getStatusCode()) {
            throw new RequestException("Bad HTTP response code {$response->getStatusCode()}");
        }

        $content = json_decode($response->getBody()->getContents(), true);

        if (!$content) {
            throw new RequestException('Empty response body content: ' . json_encode($content));
        }

        $requesterResponse = new Response($content);
        if ($requesterResponse->isError() && $exceptionOnResponseError) {
            throw new ApiException(
                "{$requesterResponse->getError()->getMessage()}; error data: ".json_encode($requesterResponse->getError()->getData()),
                $requesterResponse->getError()->getCode()
            );
        }

        return $requesterResponse;
    }

    /**
     * @throws ApiException
     *
     * @return string
     */
    private function getAccessToken(): string
    {
        switch ($this->config->getAuthType()) {
            case Constants::AUTH_BY_API_KEY:
                $accessToken = $this->config->getApiKey();

                break;
            default:
                throw new ApiException('Unknown auth type');
        }

        return $accessToken;
    }
}

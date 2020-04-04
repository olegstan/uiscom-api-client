<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Http;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Contracts\ConfigurationInterface;
use CBH\UiscomClient\Exceptions\ApiException;
use CBH\UiscomClient\Exceptions\RequestException;
use CBH\UiscomClient\Services\AbstractResource;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class ApiRequest
{
    /**
     * @var ConfigurationInterface
     */
    private $config;

    /**
     * @var AbstractResource
     */
    private $resource;

    /**
     * ApiRequest constructor.
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }

    /**
     * @param AbstractResource $resource
     *
     * @throws ApiException
     * @throws RequestException
     *
     * @return array
     */
    public function execute(AbstractResource $resource): array
    {
        $this->resource = $resource;

        $headers = [
            'User-Agent' => Constants::USER_AGENT,
        ];

        $url = "{$resource->getApiHost()}/{$resource->getApiVersion()}";

        $accessToken = $this->getAccessToken();

        $params = $resource->buildParamsForRequest();
        $params['access_token'] = $accessToken;

        die($accessToken);

        $requestParams = [
            'jsonrpc' => '2.0',
            'id' => 0,
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

        if (array_key_exists('error', $content)) {
            throw new RequestException($content['error']['message'], $content['error']['code']);
        }

        $this->resource = null;

        return $content;
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

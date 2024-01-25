<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Employee;

use CBH\UiscomClient\Constants;
use CBH\UiscomClient\Services\DataApi\Entities;
use CBH\UiscomClient\Services\DataApi\Factories\Employee;
use CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource;
use CBH\UiscomClient\Exceptions\ApiException;

/**
 * Class GetEmployees
 * @package CBH\UiscomClient\Services\DataApi\Resources\Employee
 */
class GetEmployees extends AbstractDataApiResource
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var bool
     */
    private $includeOngoingCalls = false;

    /**
     * @param int $userId
     * @return GetEmployees
     */
    public function setUserId(int $userId): GetEmployees
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): GetEmployees
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset): GetEmployees
    {
        $this->offset = $offset;
        return $this;
    }


    /**
     * Имя метода ресурса, как он называется на стороне UIS
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return Constants::DATA_API_GET_EMPLOYEES_RESOURCE;
    }

    /**
     * Имя метода, как к нему обращаются в API клиенте
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return Constants::DATA_API_GET_EMPLOYEES_METHOD;
    }

    /**
     * @throws \CBH\UiscomClient\Exceptions\ResourceException
     *
     * @return array
     */
    public function buildParamsForRequest(): array
    {
        $params = [];

        if (null !== $this->userId) {
            $params['user_id'] = $this->userId;
        }

        if (null !== $this->limit) {
            $params['limit'] = $this->limit;
        }

        if (null !== $this->offset) {
            $params['offset'] = $this->offset;
        }

        return $params;
    }

    /**
     * Выполнение запроса
     *
     * @throws \CBH\UiscomClient\Exceptions\ApiException
     * @throws \CBH\UiscomClient\Exceptions\RequestException
     * @throws \CBH\UiscomCLient\Exceptions\ResourceException
     *
     * @return Entities\Employee[]
     */
    public function execute(): Entities\Employee
    {
        $factory = new Employee();

        $response = $this->requester->execute($this);

        if (!is_array($response->getResult()->getData())) {
            throw new ApiException('Bad response');
        }

        $entities = [];
        foreach ($response->getResult()->getData() as $entity) {
            try {
                $entities[] = $factory->fromArray($entity);
            } catch (\Exception $e) {
                throw new ApiException('Error when creating entity', 0, $e);
            }
        }

        return $entities;
    }
}

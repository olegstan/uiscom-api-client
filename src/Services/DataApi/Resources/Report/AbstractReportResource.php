<?php
declare(strict_types=1);

namespace CBH\UiscomClient\Services\DataApi\Resources\Report;

use CBH\UiscomClient\Exceptions\ApiException;
use CBH\UiscomClient\Exceptions\ResourceException;
use CBH\UiscomClient\Services\DataApi\Factories\AbstractFactory;
use CBH\UiscomClient\Services\DataApi\Filters\AbstractFilter;
use CBH\UiscomClient\Services\DataApi\Pagination\Paginator;
use CBH\UiscomClient\Services\DataApi\Resources\AbstractDataApiResource;

abstract class AbstractReportResource extends AbstractDataApiResource
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @var
     */
    protected $filter;

    /**
     * @var Paginator
     */
    protected $paginator;

    /**
     * @var string[]
     */
    protected $fields = [];

    /**
     * @var \DateTime
     */
    protected $dateFrom;

    /**
     * @var \DateTime
     */
    protected $dateTill;

    /**
     * @return array
     */
    public function getNextResults(): array
    {
        if ($this->paginator instanceof Paginator) {
            $this->paginator->nextPage();
        }

        return $this->execute();
    }

    /**
     * @return \DateTime
     */
    public function getDateFrom(): \DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @param \DateTime $dateFrom
     * @return AbstractReportResource
     */
    public function setDateFrom(\DateTime $dateFrom): AbstractReportResource
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateTill(): \DateTime
    {
        return $this->dateTill;
    }

    /**
     * @param \DateTime $dateTill
     * @return AbstractReportResource
     */
    public function setDateTill(\DateTime $dateTill): AbstractReportResource
    {
        $this->dateTill = $dateTill;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param AbstractFilter $filter
     * @return AbstractReportResource
     */
    public function setFilter(AbstractFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @param Paginator $paginator
     *
     * @return AbstractReportResource
     */
    public function setPaginator(Paginator $paginator): AbstractReportResource
    {
        $this->paginator = $paginator;
        return $this;
    }

    /**
     * @param string[] $fields
     *
     * @return AbstractReportResource
     */
    public function setFields(array $fields): AbstractReportResource
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @throws ApiException
     * @throws \CBH\UiscomClient\Exceptions\RequestException
     *
     * @return array
     */
    public function execute(): array
    {
        $factory = $this->getEntityFactory();

        $response = $this->requester->execute($this);

        if (!is_array($response['data'])) {
            throw new ApiException('Bad response');
        }

        $entities = [];
        foreach ($response['data'] as $callLegData) {
            try {
                $entities[] = $factory->fromArray($callLegData);
            } catch (\Exception $e) {
                throw new ApiException('Error when creating entity', 0, $e);
            }
        }

        return $entities;
    }

    /**
     * @throws ResourceException
     *
     * @return array
     */
    protected function buildExtraParams(): array
    {
        if (null === $this->dateFrom) {
            throw new ResourceException('Date from cannot be empty');
        }

        if (null === $this->dateTill) {
            throw new ResourceException('Date till cannot be empty');
        }

        $params = [
            'date_from' => $this->dateFrom->format(self::DATE_FORMAT),
            'date_till' => $this->dateTill->format(self::DATE_FORMAT),
        ];

        if ($this->paginator instanceof Paginator) {
            $params['limit'] = $this->paginator->getLimit();
            $params['offset'] = $this->paginator->getOffset();
        }

        if (!empty($this->fields)) {
            $params['fields'] = $this->fields;
        }

        if ($this->filter instanceof AbstractFilter) {
            $params['filter'] = $this->filter->toArray();
        }

        return $params;
    }

    /**
     * @return AbstractFactory
     */
    abstract protected function getEntityFactory(): AbstractFactory;
}

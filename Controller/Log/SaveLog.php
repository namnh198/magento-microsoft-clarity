<?php

namespace CodeLands\MicrosoftClarity\Controller\Log;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\DataObject;
use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClarityInterface;
use CodeLands\MicrosoftClarity\Api\MicrosoftClarityRepositoryInterface;
use CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity\CollectionFactory;

class SaveLog extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{
    protected $searchCriteriaBuilder;

    protected $collectionFactory;

    protected $repository;

    public function __construct(
        Context $context,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        MicrosoftClarityRepositoryInterface $repository,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->repository = $repository;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        try {
            $microsoftClarity = $this->repository->getEmpty();
            $data = $this->prepareData();
            $collection = $this->getLogCollection($data);

            if ($collection->getSize()) {
                $microsoftClarity = $collection->getLastItem();
            }

            if ($microsoftClarity->getClarityUserId() != $data->getData('clarity_user_id')) {
                $microsoftClarity->addData($data->getData());
                $this->repository->save($microsoftClarity);
            }
            return $resultJson->setData(['result' => $microsoftClarity->getClarityUserId()]);
        } catch (\Exception $e) {
            return $resultJson->setData(['result' => '']);
        }
    }

    protected function getLogCollection(DataObject $object)
    {
        $storeId = $object->getData(MicrosoftClarityInterface::STORE_ID);
        $ipAddress = $object->getData(MicrosoftClarityInterface::IP_ADDRESS);
        $clarity = $object->getData(MicrosoftClarityInterface::CLARITY_USER_ID);

        $collection = $this->collectionFactory->create();
        $collection->addFilterIpAddress($ipAddress)
            ->addFilterStore($storeId)
            ->addFilterClarityUser($clarity);

        return $collection;
    }

    protected function prepareData()
    {
        $params = $this->getRequest()->getParams();
        $object = new \Magento\Framework\DataObject($params);
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $object->setData(MicrosoftClarityInterface::IP_ADDRESS, $_SERVER['REMOTE_ADDR']);
        }
        if (isset($_SERVER['HTTP_GEOIP_COUNTRY_NAME'])) {
            $object->setData(MicrosoftClarityInterface::COUNTRY, $_SERVER['HTTP_GEOIP_COUNTRY_NAME']);
        }
        return $object;
    }
}

<?php

namespace CodeLands\MicrosoftClarity\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClarityInterface;
use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClaritySearchResultInterfaceFactory;
use CodeLands\MicrosoftClarity\Api\MicrosoftClarityRepositoryInterface;
use CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity\CollectionFactory;

class MicrosoftClarityRepository implements MicrosoftClarityRepositoryInterface
{
    /**
     * @var ResourceModel\MicrosoftClarity
     */
    protected $resourceMicrosoftClarity;

    /**
     * @var MicrosoftClarityFactory
     */
    protected $microsoftClarityFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var SearchResultsInterfaceFactory
     */
    protected $searchResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @param ResourceModel\MicrosoftClarity $resourceMicrosoftClarity
     * @param MicrosoftClarityFactory $microsoftClarityFactory
     * @param CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface|null $collectionProcessor
     */
    public function __construct(
        ResourceModel\MicrosoftClarity $resourceMicrosoftClarity,
        MicrosoftClarityFactory $microsoftClarityFactory,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->resourceMicrosoftClarity = $resourceMicrosoftClarity;
        $this->microsoftClarityFactory = $microsoftClarityFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor ?: ObjectManager::getInstance()->get(CollectionProcessorInterface::class);
    }

    /**
     * @param MicrosoftClarityInterface $microsoftClarity
     * @return MicrosoftClarityInterface
     * @throws CouldNotSaveException
     */
    public function save(MicrosoftClarityInterface $microsoftClarity)
    {
        try {
            $this->resourceMicrosoftClarity->save($microsoftClarity);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $microsoftClarity;
    }

    /**
     * @param int $id
     * @return MicrosoftClarity
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $microsoftClarity = $this->microsoftClarityFactory->create();
        $this->resourceMicrosoftClarity->load($microsoftClarity, (int) $id);
        if (!$microsoftClarity->getId()) {
            throw new NoSuchEntityException(__('The item with the "%1" ID doesn\'t exist.', $id));
        }
        return $microsoftClarity;
    }

    /**
     * @return MicrosoftClarityInterface
     */
    public function getEmpty()
    {
        return $this->microsoftClarityFactory->create();
    }

    /**
     * @param MicrosoftClarityInterface $microsoftClarity
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(MicrosoftClarityInterface $microsoftClarity)
    {
        try {
            $this->resourceMicrosoftClarity->delete($microsoftClarity);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($id)
    {
        $microsoftClarity = $this->getById($id);
        return $this->delete($microsoftClarity);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * @return void
     */
    public function clearLog()
    {
        $this->resourceMicrosoftClarity->clearLog();
    }
}

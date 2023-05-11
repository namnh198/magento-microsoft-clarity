<?php

namespace CodeLands\MicrosoftClarity\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClarityInterface;
use CodeLands\MicrosoftClarity\Model\MicrosoftClarity;

interface MicrosoftClarityRepositoryInterface
{
    /**
     * @param MicrosoftClarityInterface $microsoftClarity
     * @return MicrosoftClarityInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\MicrosoftClarityInterface $microsoftClarity);

    /**
     * @param int $id
     * @return MicrosoftClarity
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param MicrosoftClarityInterface $microsoftClarity
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\MicrosoftClarityInterface $microsoftClarity);

    /**
     * @return MicrosoftClarityInterface
     */
    public function getEmpty();

    /**
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @return void
     */
    public function clearLog();
}

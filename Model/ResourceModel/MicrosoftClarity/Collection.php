<?php

namespace CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity;

use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClarityInterface;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \CodeLands\MicrosoftClarity\Model\MicrosoftClarity::class,
            \CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity::class,
        );
    }

    public function addFilterIpAddress($ipAddress)
    {
        return $this->addFieldToFilter(MicrosoftClarityInterface::IP_ADDRESS, $ipAddress);
    }

    public function addFilterStore($storeId)
    {
        return $this->addFieldToFilter(MicrosoftClarityInterface::STORE_ID, $storeId);
    }

    public function addFilterClarityUser($clarityUserId)
    {
        return $this->addFieldToFilter(MicrosoftClarityInterface::CLARITY_USER_ID, $clarityUserId);
    }
}

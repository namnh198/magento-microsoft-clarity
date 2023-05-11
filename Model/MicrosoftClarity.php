<?php
namespace CodeLands\MicrosoftClarity\Model;

use Magento\Framework\Model\AbstractModel;
use CodeLands\MicrosoftClarity\Api\Data\MicrosoftClarityInterface;

class MicrosoftClarity extends AbstractModel implements MicrosoftClarityInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\MicrosoftClarity::class);
    }

    public function getIpAddress()
    {
        return $this->getData(self::IP_ADDRESS);
    }

    public function setIpAddress($ipAddress)
    {
        return $this->setData(self::IP_ADDRESS, $ipAddress);
    }

    public function getClarityUserId()
    {
        return $this->getData(self::CLARITY_USER_ID);
    }

    public function setClarityUserId($clarityUserId)
    {
        return $this->setData(self::CLARITY_USER_ID, $clarityUserId);
    }

    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    public function getBrowser()
    {
        return $this->getData(self::BROWSER);
    }

    public function setBrowser($browser)
    {
        return $this->setData(self::BROWSER, $browser);
    }

    public function getOS()
    {
        return $this->getData(self::OS);
    }

    public function setOS($os)
    {
        return $this->setData(self::OS, $os);
    }

    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdateddAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdateddAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}

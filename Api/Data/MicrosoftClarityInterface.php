<?php

namespace CodeLands\MicrosoftClarity\Api\Data;

interface MicrosoftClarityInterface
{
    const IP_ADDRESS = 'ip_address';
    const CLARITY_USER_ID = 'clarity_user_id';
    const STORE_ID = 'store_id';
    const BROWSER = 'browser';
    const OS = 'os';
    const COUNTRY = 'country';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return MicrosoftClarityInterface
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getIpAddress();

    /**
     * @param $ipAddress
     * @return MicrosoftClarityInterface
     */
    public function setIpAddress($ipAddress);

    /**
     * @return string
     */
    public function getClarityUserId();

    /**
     * @param $clarityUserId
     * @return MicrosoftClarityInterface
     */
    public function setClarityUserId($clarityUserId);

    /**
     * @return string
     */
    public function getStoreId();

    /**
     * @param $storeId
     * @return MicrosoftClarityInterface
     */
    public function setStoreId($storeId);

    /**
     * @return string
     */
    public function getBrowser();

    /**
     * @param $browser
     * @return MicrosoftClarityInterface
     */
    public function setBrowser($browser);

    /**
     * @return string
     */
    public function getOS();

    /**
     * @param $os
     * @return MicrosoftClarityInterface
     */
    public function setOS($os);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param $country
     * @return MicrosoftClarityInterface
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param $createdAt
     * @return MicrosoftClarityInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string
     */
    public function getUpdateddAt();

    /**
     * @param $updatedAt
     * @return MicrosoftClarityInterface
     */
    public function setUpdateddAt($updatedAt);
}

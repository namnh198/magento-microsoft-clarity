<?php

namespace CodeLands\MicrosoftClarity\Block;

use CodeLands\MicrosoftClarity\Helper\Data;
use Magento\Framework\View\Element\Template;

class Log extends \Magento\Framework\View\Element\Template
{
    protected $helper;

    public function __construct(
        Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    public function isAdminArea()
    {
        return $this->getArea() === 'adminhtml';
    }

    public function getProjectId()
    {
        if ($this->isAdminArea()) {
            return $this->helper->getBackendProjectId();
        }

        return $this->helper->getFrontEndProjectId();
    }

    public function getLogUrl()
    {
        return $this->getUrl('microsoft_clarity/log/saveLog/');
    }

    public function getStoreCode()
    {
        if ($this->isAdminArea()) {
            return 'admin';
        }
        return $this->getStore()->getCode();
    }

    public function getStoreId()
    {
        if ($this->isAdminArea()) {
            return '0';
        }
        return $this->getStore()->getId();
    }

    private function getStore()
    {
        return $this->_storeManager->getStore();
    }
}

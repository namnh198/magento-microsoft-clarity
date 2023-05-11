<?php

namespace CodeLands\MicrosoftClarity\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    public function getBackendProjectId()
    {
        return $this->scopeConfig->getValue('microsoft_clarity/backend/project_id');
    }

    public function getFrontEndProjectId()
    {
        return $this->scopeConfig->getValue('microsoft_clarity/frontend/project_id', ScopeInterface::SCOPE_STORE);
    }

    public function getCleanLogDay()
    {
        return $this->scopeConfig->getValue('microsoft_clarity/general/clean_log') ?: 0;
    }
}

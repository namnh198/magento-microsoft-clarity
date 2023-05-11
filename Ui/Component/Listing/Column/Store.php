<?php

namespace CodeLands\MicrosoftClarity\Ui\Component\Listing\Column;

class Store extends \Magento\Store\Ui\Component\Listing\Column\Store
{
    protected function prepareItem(array $item)
    {
        if (!empty($item[$this->storeKey])) {
            $origStores = $item[$this->storeKey];
        }

        if (isset($item[$this->storeKey]) && $item[$this->storeKey] == 0) {
            return __('Backend');
        }
        return parent::prepareItem($item);
    }
}

<?php

namespace CodeLands\MicrosoftClarity\Ui\Component\Listing\Column\Store;

class Options extends \Magento\Store\Ui\Component\Listing\Column\Store\Options
{
    public function toOptionArray()
    {
        $options = parent::toOptionArray();
        array_unshift($options, [
            'label' => __('Backend'),
            'value' => '0'
        ]);

        return $options;
    }
}

<?php

namespace CodeLands\MicrosoftClarity\Ui\Component\Listing\Column;

class AreaOption implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => 'frontend',
                'label' => __('Front End')
            ],
            [
                'value' => 'adminhtml',
                'label' => __('Back End')
            ],
        ];
    }
}

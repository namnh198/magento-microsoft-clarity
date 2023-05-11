<?php

namespace CodeLands\MicrosoftClarity\Block\Adminhtml\Log;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class CleanAllButton implements ButtonProviderInterface
{
    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * ClearButton constructor.
     *
     * @param UrlInterface $urlBuilder
     */
    public function __construct(UrlInterface $urlBuilder)
    {
        $this->_urlBuilder = $urlBuilder;
    }

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label'      => __('Clear All Logs'),
            'class'      => 'primary',
            'on_click'   => 'deleteConfirm(\'' . __('Are you sure you want to clear logs?') . '\', \'' . $this->getClearUrl() . '\')',
            'sort_order' => 10,
        ];
    }

    public function getClearUrl()
    {
        return $this->_urlBuilder->getUrl('*/*/cleanAll');
    }
}

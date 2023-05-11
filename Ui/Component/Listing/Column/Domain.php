<?php

namespace CodeLands\MicrosoftClarity\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Domain extends Column
{
    private $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->storeManager = $storeManager;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $domain = '';
                if (isset($item['store_id'])) {
                    $domain = $this->storeManager->getStore($item['store_id'])->getBaseUrl();
                }
                $item['domain'] = $domain;
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}

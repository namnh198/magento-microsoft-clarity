<?php
namespace CodeLands\MicrosoftClarity\Controller\Adminhtml\Log;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'CodeLands_MicrosoftClarity::clean';

    protected $filter;

    protected $collectionFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        foreach ($collection as $item) {
            try {
                $item->delete();
                $total++;
            } catch (\Exception $e) {}
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $total));
        return $resultRedirect->setPath($this->_redirect->getRefererUrl());
    }
}

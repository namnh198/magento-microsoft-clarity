<?php
namespace CodeLands\MicrosoftClarity\Controller\Adminhtml\Log;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'CodeLands_MicrosoftClarity::index';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
         /** @var \Magento\Framework\View\Result\Page $resultPage */
         $resultPage = $this->_pageFactory->create();
         $resultPage->setActiveMenu('CodeLands_MicrosoftClarity::index');
         $resultPage->addBreadcrumb(__('Microsoft Clarity'), __('Microsoft Clarity'));
         $resultPage->getConfig()->getTitle()->prepend(__('Microsoft Clarity'));
         return $resultPage;
    }
}

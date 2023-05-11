<?php
namespace CodeLands\MicrosoftClarity\Controller\Adminhtml\Log;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use CodeLands\MicrosoftClarity\Api\MicrosoftClarityRepositoryInterface;

class CleanAll extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'CodeLands_MicrosoftClarity::clean';

    protected $microsoftClarityRepository;

    public function __construct(
        Context $context,
        MicrosoftClarityRepositoryInterface $microsoftClarityRepository
    ) {
        parent::__construct($context);
        $this->microsoftClarityRepository = $microsoftClarityRepository;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $this->microsoftClarityRepository->clearLog();
        $this->messageManager->addSuccessMessage(__('Clean Successfully'));
        return $resultRedirect->setPath($this->_redirect->getRefererUrl());
    }
}

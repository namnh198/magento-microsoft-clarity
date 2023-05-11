<?php

namespace CodeLands\MicrosoftClarity\Cron;

use CodeLands\MicrosoftClarity\Helper\Data;
use CodeLands\MicrosoftClarity\Model\ResourceModel\MicrosoftClarity;

class ClearLog
{
    private $helper;

    private $resourceModel;

    public function __construct(
        Data $helper,
        MicrosoftClarity $resourceModel
    ) {
        $this->helper = $helper;
        $this->resourceModel = $resourceModel;
    }

    public function execute()
    {
        $day = $this->helper->getCleanLogDay();

        if ($day > 0) {
            $timeEnd = date('Y-m-d H:i:s', strtotime("-{$day} days")) ;
            $connection = $this->resourceModel->getConnection();
            $table = $this->resourceModel->getMainTable();
            $connection->delete($table, ['created_at <= ?' => $timeEnd]);
        }
    }
}

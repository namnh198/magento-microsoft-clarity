<?php
namespace CodeLands\MicrosoftClarity\Model\ResourceModel;

class MicrosoftClarity extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    const TABLE_NAME = 'microsoft_clarity';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'id');
    }

    /**
     * @return void
     */
    public function clearLog()
    {
        $this->getConnection()->truncateTable(self::TABLE_NAME);
    }
}

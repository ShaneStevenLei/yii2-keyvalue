<?php

use yii\db\Migration;

/**
 * Class m180307_113454_create_table_key_value
 */
class m180307_113454_create_table_key_value extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = <<<EOF
CREATE TABLE `key_value` (
    `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
    `key` VARCHAR(100) NOT NULL COMMENT '键',
    `value` TEXT COMMENT '值',
    `memo` TEXT COMMENT '备注',
    `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active' COMMENT '状态：active-激活，inactive-未激活',
    `created_user_id` INT NOT NULL COMMENT '创建人员',
    `updated_user_id` INT NOT NULL COMMENT '更新人员',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `idx_key_status` (`key` , `status`),
    KEY `idx_created_user_id` (`created_user_id`),
    KEY `idx_updated_user_id` (`updated_user_id`),
    KEY `idx_created_at` (`created_at`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI COMMENT='键值对数据表';
EOF;
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable('key_value');
        echo "m180307_113454_create_table_key_value cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180307_113454_create_table_key_value cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m191122_103334_add_disposition_table
 */
class m191122_103334_add_disposition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191122_103334_add_disposition_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_103334_add_disposition_table cannot be reverted.\n";

        return false;
    }
    */
}

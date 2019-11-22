<?php

use yii\db\Migration;

/**
 * Class m191122_103251_add_leads_table
 */
class m191122_103251_add_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable("leads", [
        //     "id" => Schema::TYPE_PK,
        //     "user_id" => Schema::TYPE_STRING,
        //     "disposition_id" => Schema::TYPE_TEXT,
        //     "name" => Schema::TYPE_TEXT,
        //     "phone" => Schema::TYPE_TEXT,
        //     "email" => Schema::TYPE_TEXT,
        //     "problem" => Schema::TYPE_TEXT,
        //     "next_calling_after" => Schema::TYPE_TEXT,
        //     "address" => Schema::TYPE_TEXT,
        //     "city" => Schema::TYPE_TEXT,
        //      "state" => Schema::TYPE_TEXT,
        //      "pincode" => Schema::TYPE_TEXT,
            

        //  ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191122_103251_add_leads_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_103251_add_leads_table cannot be reverted.\n";

        return false;
    }
    */
}

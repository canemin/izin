<?php

use yii\db\Migration;

/**
 * Class m190104_061418_izin
 */
class m190104_061418_izin extends Migration
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
        echo "m190104_061418_izin cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
$this->createTable('izin', [
        'id' => $this->primaryKey(),
		'starting_date' => $this->date()->notNull(),
		'end_date' => $this->date()->notNull(),
        'phone_number' => $this->integer(11)->notNull(),
		'address' => $this->string(500)->notNull(),
		'status' => $this->string(100)->notNull(),
        'mail_address' => $this->text()->notNull(),
    ]);
    }

    public function down()
    {
 $this->dropTable('izin');
        return false;
    }
    
}

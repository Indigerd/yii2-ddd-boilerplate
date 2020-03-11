<?php

use yii\db\Migration;

class m200311_120000_article extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'categoryId' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%article_categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('{{%article_categories}}', [
            'id' => 1,
            'name' => 'Category1'
        ]);
        $this->insert('{{%article_categories}}', [
            'id' => 2,
            'name' => 'Category2'
        ]);
        $this->insert('{{%articles}}', [
            'categoryId' => 1,
            'title' => 'Article1'
        ]);
        $this->insert('{{%articles}}', [
            'categoryId' => 1,
            'title' => 'Article2'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
        $this->dropTable('{{%article_categories}}');
    }
}

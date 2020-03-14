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

        $this->createTable('{{%article_comments}}', [
            'id' => $this->primaryKey(),
            'articleId' => $this->integer()->notNull(),
            'content' => $this->string()->notNull(),
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
            'title' => 'Article11',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.'
        ]);
        $this->insert('{{%articles}}', [
            'categoryId' => 1,
            'title' => 'Article12',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.'
        ]);
        $this->insert('{{%articles}}', [
            'categoryId' => 2,
            'title' => 'Article21',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.'
        ]);
        $this->insert('{{%articles}}', [
            'categoryId' => 2,
            'title' => 'Article22',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%article_comments}}');
        $this->dropTable('{{%articles}}');
        $this->dropTable('{{%article_categories}}');
    }
}

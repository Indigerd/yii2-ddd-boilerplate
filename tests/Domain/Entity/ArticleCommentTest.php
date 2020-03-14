<?php declare(strict_types=1);

namespace Test\Domain\Entity;

use Domain\Entity\ArticleComment;
use PHPUnit\Framework\TestCase;

class ArticleCommentTest extends TestCase
{
    /** @var  ArticleComment */
    protected $model;

    public function setUp(): void
    {
        $this->model = new ArticleComment();
    }

    public function testId()
    {
        $id = '1';
        $this->model->setId($id);
        $this->assertEquals($id, $this->model->getId());
    }

    public function testIdException()
    {
        $this->expectException('\TypeError');
        $id = 1;
        $this->model->setId($id);
    }

    public function testContent()
    {
        $content = 'Article content';
        $this->model->setContent($content);
        $this->assertEquals($content, $this->model->getContent());
    }

    public function testContentException()
    {
        $this->expectException('\TypeError');
        $content = 1;
        $this->model->setContent($content);
    }

    public function testArticleId()
    {
        $id = '1';
        $this->model->setArticleId($id);
        $this->assertEquals($id, $this->model->getArticleId());
    }

    public function testArticleIdException()
    {
        $this->expectException('\TypeError');
        $id = 1;
        $this->model->setArticleId($id);
    }
}

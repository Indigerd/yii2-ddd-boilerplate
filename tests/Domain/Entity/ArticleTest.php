<?php declare(strict_types=1);

namespace Test\Domain\Entity;

use Domain\Entity\ArticleCategory;
use PHPUnit\Framework\TestCase;
use Domain\Entity\Article;

class ArticleTest extends TestCase
{
    /** @var  Article */
    protected $model;

    public function setUp(): void
    {
        $this->model = new Article();
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

    public function testTitle()
    {
        $title = 'Article title';
        $this->model->setTitle($title);
        $this->assertEquals($title, $this->model->getTitle());
    }

    public function testTitleException()
    {
        $this->expectException('\TypeError');
        $title = 1;
        $this->model->setTitle($title);
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

    public function testCategory()
    {
        $categoryId = '2323';
        $category = new ArticleCategory();
        $category->setId($categoryId);
        $this->model->setCategory($category);
        $this->assertEquals($category, $this->model->getCategory());
        $reflection = new \ReflectionClass(Article::class);
        $property = $reflection->getProperty('categoryId');
        $property->setAccessible(true);
        $reflectionValue = $property->getValue($this->model);
        $this->assertEquals($categoryId, $reflectionValue);
    }

    public function testCategoryException()
    {
        $this->expectException('\TypeError');
        $this->model->setCategory(new \stdClass());
    }
}

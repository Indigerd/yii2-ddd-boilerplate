<?php declare(strict_types=1);

namespace Test\Domain\Entity;

use Domain\Entity\ArticleCategory;
use PHPUnit\Framework\TestCase;

class ArticleCategoryTest extends TestCase
{
    /** @var  ArticleCategory */
    protected $model;

    public function setUp(): void
    {
        $this->model = new ArticleCategory();
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

    public function testName()
    {
        $name = 'Name';
        $this->model->setName($name);
        $this->assertEquals($name, $this->model->getName());
    }

    public function testContentException()
    {
        $this->expectException('\TypeError');
        $name = 1;
        $this->model->setName($name);
    }
}

<?php declare(strict_types=1);

namespace Test\Domain\Collection;

use PHPUnit\Framework\TestCase;
use Domain\Collection\ArticleCategoryCollection;
use Domain\Entity\ArticleCategory;
use Test\Fixture\Entity\DummyEntity;

class ArticleCategoryCollectionTest extends TestCase
{
    /** @var  ArticleCategoryCollection */
    protected $collection;

    public function setUp(): void
    {
        $this->collection = new ArticleCategoryCollection();
    }

    public function testAddException()
    {
        $this->expectException('\InvalidArgumentException');
        $this->collection->add(new DummyEntity());
    }

    public function testAdd()
    {
        $model = new ArticleCategory();
        $this->collection->add($model);
        $this->assertEquals($model, \reset($this->collection)[0]);
    }
}

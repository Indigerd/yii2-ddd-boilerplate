<?php declare(strict_types=1);

namespace Test\Domain\Collection;

use PHPUnit\Framework\TestCase;
use Domain\Collection\ArticleCollection;
use Domain\Entity\Article;
use Test\Fixture\Entity\DummyEntity;

class ArticleCollectionTest extends TestCase
{
    /** @var  ArticleCollection */
    protected $collection;

    public function setUp(): void
    {
        $this->collection = new ArticleCollection();
    }

    public function testAddException()
    {
        $this->expectException('\InvalidArgumentException');
        $this->collection->add(new DummyEntity());
    }

    public function testAdd()
    {
        $model = new Article();
        $this->collection->add($model);
        $this->assertEquals($model, \reset($this->collection)[0]);
    }
}

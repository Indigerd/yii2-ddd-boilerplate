<?php declare(strict_types=1);

namespace Test\Domain\Collection;

use PHPUnit\Framework\TestCase;
use Domain\Collection\ArticleCommentCollection;
use Domain\Entity\ArticleComment;
use Test\Fixture\Entity\DummyEntity;

class ArticleCommentCollectionTest extends TestCase
{
    /** @var  ArticleCommentCollection */
    protected $collection;

    public function setUp(): void
    {
        $this->collection = new ArticleCommentCollection();
    }

    public function testAddException()
    {
        $this->expectException('\InvalidArgumentException');
        $this->collection->add(new DummyEntity());
    }

    public function testAdd()
    {
        $model = new ArticleComment();
        $this->collection->add($model);
        $this->assertEquals($model, \reset($this->collection)[0]);
    }
}

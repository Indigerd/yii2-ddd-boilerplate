<?php declare(strict_types=1);

namespace Test\Domain\Collection;

use PHPUnit\Framework\TestCase;
use Domain\Collection\Collection;

class CollectionTest extends TestCase
{
    protected $collection;

    protected $items;

    public function setUp(): void
    {
        $this->items = [
            new DummyEntity(1),
            new DummyEntity(2)
        ];
        $this->collection = new Collection(DummyEntity::class, $this->items);
    }

    public function testCount()
    {
        $this->assertEquals(\count($this->items), count($this->collection));
    }

    public function testIterator()
    {
        $i = 0;
        foreach ($this->collection as $item) {
            $i++;
            $this->assertInstanceOf(DummyEntity::class, $item);
        }
        $this->assertEquals(\count($this->items), $i);
    }

    public function testValidateAdd()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->collection->add(new \stdClass());
    }

    public function testAdd()
    {
        $count = \count($this->collection);
        $this->collection->add(new DummyEntity(3));
        $this->assertEquals(($count + 1), \count($this->collection));
    }

    public function testClear()
    {
        $this->collection->add(new DummyEntity(1));
        $this->collection->add(new DummyEntity(2));
        $this->collection->clear();
        $this->assertEquals(0, $this->collection->count());
    }
}

class DummyEntity
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
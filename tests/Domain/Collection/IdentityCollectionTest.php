<?php declare(strict_types=1);

namespace Test\Domain\Collection;

use PHPUnit\Framework\TestCase;
use Domain\Collection\IdentityCollection;
use Test\Fixture\Entity\DummyIdentityEntity;

class IdentityCollectionTest extends TestCase
{
    /** @var  IdentityCollection */
    protected $collection;

    public function setUp(): void
    {
        $this->collection = new IdentityCollection(DummyIdentityEntity::class);
    }

    public function testRemove()
    {
        $entity1 = new DummyIdentityEntity();
        $entity1->setId('1');
        $entity2 = new DummyIdentityEntity();
        $entity2->setId('2');
        $this->assertEquals(0, \sizeof($this->collection));
        $this->collection->add($entity1);
        $this->collection->add($entity2);
        $this->assertEquals(2, \sizeof($this->collection));
        $this->collection->remove($entity1);
        $this->assertEquals(1, \sizeof($this->collection));
        $m = \reset($this->collection);
        $this->assertEquals($entity2, \array_pop($m));
    }
}

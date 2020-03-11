<?php declare(strict_types=1);

namespace Tests\Infrastructure\Http;

use PHPUnit\Framework\TestCase;
use Infrastructure\Http\LinkHeader;

class LinkHeaderTest extends TestCase
{
    public function testGetters()
    {
        $link = 'http://domain.com/path';
        $relation = 'illness';
        $linkHeader = new LinkHeader($link, $relation);
        $this->assertEquals($link, $linkHeader->getLink());
        $this->assertEquals($relation, $linkHeader->getRelation());
    }
}

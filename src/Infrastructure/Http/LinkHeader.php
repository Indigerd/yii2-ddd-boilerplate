<?php declare(strict_types=1);

namespace Infrastructure\Http;

class LinkHeader
{
    protected $link;

    protected $relation;

    public function __construct(string $link, string $relation)
    {
        $this->link = $link;
        $this->relation = $relation;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getRelation(): string
    {
        return $this->relation;
    }
}

<?php declare(strict_types=1);

namespace Domain\Entity;

class Article implements IdentityInterface
{
    protected $id = '';

    protected $title = '';

    protected $content = '';

    protected $category;

    protected $categoryId = '';

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCategory(): ?ArticleCategory
    {
        return $this->category;
    }

    public function setCategory(ArticleCategory $category): void
    {
        $this->category = $category;
        $this->categoryId = $category->getId();
    }
}

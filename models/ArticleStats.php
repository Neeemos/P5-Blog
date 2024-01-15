<?php 

/**
 * Entité pour les statistiques d'articles.
 */
class ArticleStats extends AbstractEntity
{
    private int $articleId;
    private int $viewCount;
    private string $title;

    /**
     * Setter pour l'id de l'article.
     * @param int $articleId
     */
    public function setId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    /**
     * Getter pour l'id de l'article.
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * Setter pour le nombre de vues.
     * @param int $viewCount
     */
    public function setViewCount(int $viewCount): void
    {
        $this->viewCount = $viewCount;
    }

    /**
     * Getter pour le nombre de vues.
     * @return int
     */
    public function getViewCount(): int
    {
        return $this->viewCount;
    }

    /**
     * Setter pour le titre de l'article.
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre de l'article.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}

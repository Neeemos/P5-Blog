<?php
/**
 * Classe qui gère les statistiques d'articles.
 */
class ArticleStatsManager extends AbstractEntityManager
{
    /**
     * Ajoute ou met à jour les statistiques de vue pour un article.
     * @param int $articleId : l'id de l'article.
     * @return void
     */
    public function addOrUpdateStats(int $articleId): void
    {
        $sql = "UPDATE article SET view_count = view_count + 1 WHERE id = :article_id";

        $this->db->query($sql, ['article_id' => $articleId]);

    }

    /**
 * Récupère tous les articleStats avec ou sans filtre.
 * @param string|null $filter : colonne de filtre.
 * @param string|null $filterBy : asc/desc.
 * @return array : un tableau d'objets ArticleStats.
 */
public function getAllStatsWithArticle(?string $filter = null, ?string $filterBy = null): array
{
    $allowedColumns = ['title', 'view_count', 'id'];
    $column = in_array($filter, $allowedColumns) ? $filter : 'id';
    $filterQuery = ($filterBy == 'desc') ? " ORDER BY $column DESC " : " ORDER BY $column ASC ";
    
    $sql = "SELECT id, title, view_count
            FROM article
            $filterQuery";

    $result = $this->db->query($sql);
    $stats = [];

    while ($stat = $result->fetch()) {
        $stats[] = new ArticleStats($stat);
    }

    return $stats;
}
}

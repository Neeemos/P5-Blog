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
        $sql = "INSERT INTO article_views (article_id, view_count) VALUES (:article_id, 1)
                ON DUPLICATE KEY UPDATE view_count = view_count + 1";

        $this->db->query($sql, ['article_id' => $articleId]);
        
    }

   /**
     * Récupère tous les articleStats.
     * @return array : un tableau d'objets ArticleStats.
     */
    public function getAllStatsWithArticleTitle(): array
    {
        $sql = "SELECT av.article_id, av.view_count, a.title
                FROM article_views av
                JOIN article a ON av.article_id = a.id";

        $result = $this->db->query($sql);
        $stats = [];

        while ($stat = $result->fetch()) {
            $stats[] = new ArticleStats($stat);
        }

        return $stats;
    }
}

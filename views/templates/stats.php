<?php
/** 
 * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
 * Et un formulaire pour ajouter un article. 
 */
$filter = $filter ?? '';
($filter === 'title') ? '<i class="fas fa-arrow-up"></i>' : '';
?>

<h2>Informations et statistiques</h2>


<div class="adminArticle">
    <table class="articleTable">
        <thead>
            <tr>
                <th>
                    <a href="index.php?action=stats&filter=title">Titres
                        <?php echo ($filter === 'title') ? '<i class="fas fa-arrow-down"></i>' : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&filter=article">Article
                        <?php echo ($filter === 'article') ? '<i class="fas fa-arrow-down"></i>' : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&filter=view_count">Nombre de vue
                        <?php echo ($filter === 'view_count') ? '<i class="fas fa-arrow-down"></i>' : ''; ?>
                    </a>
                </th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stats as $stat) { ?>
                <tr>
                    <td class="title">
                        <?= $stat->getTitle() ?>
                    </td>
                    <td><a href="index.php?action=showArticle&id=<?= $stat->getArticleId() ?>">
                            <?= $stat->getArticleId() ?>
                        </a></td>
                    <td class="content">
                        <?= $stat->getViewCount() ?> personnes
                    </td>
                    <td><a class="submit"
                            href="index.php?action=showUpdateArticleForm&id=<?= $stat->getArticleId() ?>">Modifier</a></td>
                    <td><a class="submit" href="index.php?action=deleteArticle&id=<?= $stat->getArticleId() ?>"
                            <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
// Assuming $filter and $filterby are defined
$filter = $filter ?? '';
$filterby = $filterBy ?? '';

$filtered = ($filterby === 'asc') ? 'asc' : (($filterby === 'desc') ? 'desc' : false);
?>

<h2>Informations et statistiques</h2>

<div class="adminArticle">
    <table class="articleTable">
        <thead>
            <tr>
                <th>
                    <a href="index.php?action=stats&filter=title&filterBy=<?= ($filter === 'title' && $filtered === 'asc') ? 'desc' : 'asc' ?>">
                        Titres <?= ($filter === 'title') ? ($filtered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&filter=article&filterBy=<?= ($filter === 'article' && $filtered === 'asc') ? 'desc' : 'asc' ?>">
                        Article <?= ($filter === 'article') ? ($filtered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&filter=view_count&filterBy=<?= ($filter === 'view_count' && $filtered === 'asc') ? 'desc' : 'asc' ?>">
                        Nombre de vue <?= ($filter === 'view_count') ? ($filtered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stats as $stat) { ?>
                <tr>
                    <td class="title"><?= $stat->getTitle() ?></td>
                    <td><a href="index.php?action=showArticle&id=<?= $stat->getArticleId() ?>"><?= $stat->getArticleId() ?></a></td>
                    <td class="content"><?= $stat->getViewCount() ?> personnes</td>
                    <td><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $stat->getArticleId() ?>">Modifier</a></td>
                    <td><a class="submit" href="index.php?action=deleteArticle&id=<?= $stat->getArticleId() ?>"
                            <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

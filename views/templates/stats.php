<?php
// Assuming $order and $orderby are defined
$order = $order ?? '';
$orderby = $orderBy ?? '';
$ordered = ($orderby === 'asc') ? 'asc' : (($orderby === 'desc') ? 'desc' : false);
?>

<h2>Informations et statistiques</h2>

<div class="adminArticle">
    <table class="articleTable">
        <thead>
            <tr>
                <th>
                    <a href="index.php?action=stats&order=title&orderBy=<?= ($order === 'title' && $ordered === 'asc') ? 'desc' : 'asc' ?>">
                        Titres <?= ($order === 'title') ? ($ordered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&order=article&orderBy=<?= ($order === 'article' && $ordered === 'asc') ? 'desc' : 'asc' ?>">
                        Article <?= ($order === 'article') ? ($ordered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&order=view_count&orderBy=<?= ($order === 'view_count' && $ordered === 'asc') ? 'desc' : 'asc' ?>">
                        Nombre de vue <?= ($order === 'view_count') ? ($ordered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&order=date_creation&orderBy=<?= ($order === 'date_creation' && $ordered === 'asc') ? 'desc' : 'asc' ?>">
                        Date de creation <?= ($order === 'date_creation') ? ($ordered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="index.php?action=stats&order=countComment&orderBy=<?= ($order === 'countComment' && $ordered === 'asc') ? 'desc' : 'asc' ?>">
                        Nombre de commentaire <?= ($order === 'countComment') ? ($ordered === 'asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>') : ''; ?>
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
                    <td class="content"><?= $stat->getDateCreation() ?></td>
                    <td class="content"><?= $stat->getCountComment() ?></td>
                    <td><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $stat->getArticleId() ?>">Modifier</a></td>
                    <td><a class="submit" href="index.php?action=deleteArticle&id=<?= $stat->getArticleId() ?>"
                            <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

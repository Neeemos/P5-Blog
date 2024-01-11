<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<h2>Informations et statistiques</h2>


<div class="adminArticle">
<div class="articleLine">
<div class="title"> Titres </div>
    <div>Article</div>
    <div >Nombre de vue</div>
    <div class="content"> Modifier</div>
    <div class="content"> Supprimer</div>
</div>
    <?php foreach ($stats as $stat) { ?>
        <div class="articleLine">
            <div class="title"><?= $stat->getTitle() ?></div>
            <div><a href="index.php?action=showArticle&id=<?= $stat->getArticleId() ?>"><?= $stat->getArticleId() ?>        </a></div>
            <div class="content"><?= $stat->getViewCount() ?> personnes  </div>
            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $stat->getArticleId() ?>">Modifier</a></div>
            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $stat->getArticleId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
        </div>
    <?php } ?>
</div>
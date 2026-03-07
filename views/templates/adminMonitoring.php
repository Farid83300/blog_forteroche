<?php
    /**
     * Page de monitoring, affichage des statistiques d'utilisation du site.
     */
?>

<h2>Monitoring des articles</h2>

<div class="adminArticle adminArticle--monitoring">

    <div class="articleLine articleLine--header">
        <div class="title">Titre</div>
        <div class="content">Date de publication</div>
        <div class="content">Vues</div>
        <div class="content">Commentaires</div>
    </div>

    <?php foreach ($articles as $index => $article) { ?>
        <div class="articleLine <?= $index % 2 === 0 ? '' : 'articleLine--alt' ?>">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="content infoMonitoring"><?= $article->getDateCreation()->format('d/m/Y') ?></div>
            <div class="content infoMonitoring"><?= $article->getViews() ?> vue<?= $article->getViews() > 1 ? 's' : '' ?></div>
            <div class="content infoMonitoring"><?= $article->getCommentCount() ?> commentaire<?= $article->getCommentCount() > 1 ? 's' : '' ?></div>
        </div>
    <?php } ?>

</div>
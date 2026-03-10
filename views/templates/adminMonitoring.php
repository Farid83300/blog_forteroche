<?php
    /**
     * Page de monitoring, affichage des statistiques d'utilisation du site.
     */

    // Fonction helper pour générer le lien et la flèche de tri d'une colonne.
    // Si la colonne est déjà active, on inverse le sens. Sinon on part sur ASC.
    function sortLink(string $column, string $label, ?string $currentSort = null, ?string $currentOrder = null) : string
    {
        // Valeurs de secours si les paramètres ne sont pas fournis.
        $currentSort  = $currentSort  ?? 'date_creation';
        $currentOrder = $currentOrder ?? 'DESC';

        // Construction des liens de tri pour la colonne. Si la colonne est déjà active, on inverse le sens. Sinon on part sur ASC.
        $linkDesc = 'index.php?action=adminMonitoring&sort=' . $column . '&order=DESC';
        $linkAsc  = 'index.php?action=adminMonitoring&sort=' . $column . '&order=ASC';

        $upClass   = ($currentSort === $column && $currentOrder === 'DESC') ? 'arrow arrow--active' : 'arrow';
        $downClass = ($currentSort === $column && $currentOrder === 'ASC')  ? 'arrow arrow--active' : 'arrow';

        return '<span class="sortHeader">'
             . $label
             . '<span class="arrows">'
             . '<a href="' . $linkDesc . '" class="' . $upClass   . '">▲</a>'
             . '<a href="' . $linkAsc  . '" class="' . $downClass . '">▼</a>'
             . '</span>'
             . '</span>';
    }
?>

<h2>Monitoring des articles</h2>

<div class="adminArticle adminArticle--monitoring">

    <div class="articleLine articleLine--header">
        <div class="title"><?= sortLink('title', 'Titre', $sort, $order) ?></div>
        <div class="content"><?= sortLink('date_creation', 'Date de publication', $sort, $order) ?></div>
        <div class="content"><?= sortLink('views', 'Vues', $sort, $order) ?></div>
        <div class="content"><?= sortLink('comment_count', 'Commentaires', $sort, $order) ?></div>
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
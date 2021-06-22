<?php
require "assets/php/classes/article.php";
if (!empty($_POST['article_title']) && !empty($_POST['article_content'])) {
    add_article($_POST['article_title'], $_POST['article_content']);
    header("Location: index.php?url=nouveautes");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('assets/php/head.php'); ?>
    <title>Nouveautés</title>
</head>
<body>
<?php require('assets/php/navbar.php'); ?>
<div class="containner">
    <div class="row mt-5">
        <?php foreach (get_all_articles() as $art) {
            $article = new Article($art['id_article']); ?>
            <div class="col-md-3 col-sm-2 col-1"></div>
            <div class="card border-primary mb-3 col-md-6 col-sm-8 col-10">
                <h3 class="pt-3"><?= $article->getTitleArticle() ?></h3>
                <figure>
                    <blockquote class="blockquote">
                    
                        <?php $image_link = $article->getImageArticle(); 
                        if (!empty($image_link)) { ?>
                            <img src="<?= $image_link ?>" class="w-25">
                        <?php } ?>
                        <p class="mb-0"><?= $article->getContentArticle() ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Article posté par <cite><a href="index.php?url=personnel&id=<?= $article->getAuthorId() ?>" target="_blank"><?= $article->getAuthorName() ?></a> le <?= $article->getDateArticle() ?></cite>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-3 col-sm-2 col-1"></div>
        <?php } ?>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-2 col-1"></div>
        <div class="card border-primary mb-3 col-md-6 col-sm-8 col-10">
            <form method="POST" action="index.php?url=nouveautes"  enctype="multipart/form-data">
                <fieldset>
                    <legend class="mt-2 text-center">Ajouter un article</legend>
                    <div class="form-group">
                    <label class="col-sm-2 col-form-label">Titre de l'article</label>
                        <input type="text" class="form-control" placeholder="Titre de l'article" name="article_title" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4">Contenu de l'article</label>
                        <textarea class="form-control"rows="5" placeholder="Contenu de l'article" name="article_content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label mt-4">Ajouter une image</label>
                        <input class="form-control" type="file" name="article_image">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 my-3">Poster</button>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
<?php require('assets/php/footer.php'); ?>

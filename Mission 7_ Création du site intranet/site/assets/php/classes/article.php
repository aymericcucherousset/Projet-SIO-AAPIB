<?php

class Article{

    private int $id;

    public function __construct($id)
    {
        $this->id = htmlspecialchars($id);
    }


    public function getAuthorId():int
    {
        $req = "SELECT id_auteur
        FROM article
        WHERE id_article = ?";
        $req_get_article_title = bdd()->prepare($req);
        $req_get_article_title->execute(array($this->id));
        return $req_get_article_title->fetch()['id_auteur'];
    }
    public function getTitleArticle():string
    {
        $req = "SELECT titre_article
        FROM article
        WHERE id_article = ?";
        $req_get_article_title = bdd()->prepare($req);
        $req_get_article_title->execute(array($this->id));
        return $req_get_article_title->fetch()['titre_article'];
    }
    public function getContentArticle():string
    {
        $req = "SELECT contenu_article
        FROM article
        WHERE id_article = ?";
        $req_get_article_title = bdd()->prepare($req);
        $req_get_article_title->execute(array($this->id));
        return $req_get_article_title->fetch()['contenu_article'];
    }
    public function getAuthorName()
    {
        $req = "SELECT user.last_name, user.first_name
        FROM user, article 
        WHERE article.id_auteur = user.id
        AND id_article = ?";
        $req_get_author_name = bdd()->prepare($req);
        $req_get_author_name->execute(array($this->id));
        $r_fetch = $req_get_author_name->fetch();
        return strtoupper($r_fetch['last_name']). ' ' .$r_fetch['first_name'];
    }
    public function getDateArticle():string
    {
        $req = "SELECT date_article
        FROM article
        WHERE id_article = ?";
        $req_get_article_title = bdd()->prepare($req);
        $req_get_article_title->execute(array($this->id));
        return $req_get_article_title->fetch()['date_article'];
    }
    public function getImageArticle()
    {
        $req = "SELECT image_article
        FROM article
        WHERE id_article = ?";
        $req_get_article_image_path = bdd()->prepare($req);
        $req_get_article_image_path->execute(array($this->id));
        return $req_get_article_image_path->fetch()['image_article'];
    }

    public function update_image(string $newImagePath)
    {
        $req = "UPDATE `ARTICLE` SET `image_article`=? WHERE id_article = ?";
        $req_update_article_image_path = bdd()->prepare($req);
        $req_update_article_image_path->execute(array(htmlspecialchars($newImagePath), $this->id));
    }
    public function upload_image($file)
    {
        if ($file["type"] == "image/png" || $file["type"] == "image/jpeg") {
            $uploaddir = 'uploads_article_picture/';
            
            // Génération de l'emplacement du fichier
            $ext = explode('.', $file['name'])[sizeof(explode('.', $file['name']))-1];
            $uploadfile = $uploaddir.$this->id.'.'.$ext;
            
            // Supprimer l'ancienne image
            if (file_exists($uploadfile)) {
                unlink($uploadfile);
            }
            
            // Upload de la nouvelle image
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $this->update_image("http://localhost/intranet/".$uploadfile);
            } else {
                echo "Image uploading failed.";
            } 
        }
    
    }
}
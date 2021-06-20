<?php

class Personnel 
{
    private int $id;

    public function __construct($id)
    {
        $this->id = htmlspecialchars($id);
    }

    // Getter
    public function getId():int
    {
        return $this->id;
    }
    public function getUserEmail():string
    {
        $req = "SELECT email 
        FROM user 
        WHERE id = ?";
        $req_get_user_email = bdd()->prepare($req);
        $req_get_user_email->execute(array($this->id));
        return $req_get_user_email->fetch()['email'];
    }
    public function getUserFirstName()
    {
        $req = "SELECT first_name 
        FROM user 
        WHERE id = ?";
        $req_get_user_first_name = bdd()->prepare($req);
        $req_get_user_first_name->execute(array($this->id));
        return $req_get_user_first_name->fetch()['first_name'];
    }
    public function getUserLastName()
    {
        $req = "SELECT last_name 
        FROM user 
        WHERE id = ?";
        $req_get_user_last_name = bdd()->prepare($req);
        $req_get_user_last_name->execute(array($this->id));
        return $req_get_user_last_name->fetch()['last_name'];
    }
    public function getUserJoinDate()
    {
        $req = "SELECT join_date 
        FROM user 
        WHERE id = ?";
        $req_get_user_last_name = bdd()->prepare($req);
        $req_get_user_last_name->execute(array($this->id));
        return $req_get_user_last_name->fetch()['join_date'];
    }
    public function getUserService()
    {
        $req="SELECT service.name_service
        FROM service, service_member
        WHERE service_member.service_id = service.id_service
        AND service_member.user_id = ?";
        $req_get_user_service = bdd()->prepare($req);
        $req_get_user_service->execute(array($this->id));
        return $req_get_user_service->fetch()['name_service'];
    }
    public function getUserJob()
    {
        $req="SELECT job_label.job_label
        FROM job_label, job_member
        WHERE job_label.job_id = job_member.job_id
        AND job_member.user_id = ?";
        $req_get_user_job = bdd()->prepare($req);
        $req_get_user_job->execute(array($this->id));
        return $req_get_user_job->fetch()['job_label'];
    }
    public function getUserImagePath()
    {
        $req = "SELECT image_path 
        FROM user 
        WHERE id = ?";
        $req_get_user_image_path = bdd()->prepare($req);
        $req_get_user_image_path->execute(array($this->id));
        return $req_get_user_image_path->fetch()['image_path'];
    }
    public function getPersonnel()
    {
        $req="SELECT user.id, user.last_name, user.first_name, user.email, service.name_service, job_label.job_label
        FROM user, service, service_member, job_label, job_member
        WHERE user.id = service_member.user_id
        AND service_member.service_id = service.id_service
        AND job_label.job_id = job_member.job_id
        AND job_member.user_id = user.id
        AND user.id = ?";
        $req_get_personnel = bdd()->prepare($req);
        $req_get_personnel->execute(array($this->id));
        return $req_get_personnel->fetch();
    }
    public function getUserStatus():int
    {
        $req = "SELECT disabled 
        FROM user 
        WHERE id = ?";
        $req_get_user_disabled = bdd()->prepare($req);
        $req_get_user_disabled->execute(array($this->id));
        return $req_get_user_disabled->fetch()['disabled'];
    }

    // Setter

    public function updateEmail(string $newEmail)
    {
        if($newEmail != $this->getUserEmail() && !empty($newEmail)){
            $req = "UPDATE `user` SET `email`=? WHERE id = ?";
            $req_update_user_email = bdd()->prepare($req);
            $req_update_user_email->execute(array(htmlspecialchars($newEmail), $this->id));
        }
    }
    public function updateFirstName(string $newFirstName)
    {
        if($newFirstName != $this->getUserFirstName() && !empty($newFirstName)){
            $req = "UPDATE `user` SET `first_name`=? WHERE id = ?";
            $req_update_user_first_name = bdd()->prepare($req);
            $req_update_user_first_name->execute(array(htmlspecialchars($newFirstName), $this->id));
        }
    }
    public function updateLastName(string $newLastName)
    {
        if($newLastName != $this->getUserLastName() && !empty($newLastName)){
            $req = "UPDATE `user` SET `last_name`=? WHERE id = ?";
            $req_update_user_last_name = bdd()->prepare($req);
            $req_update_user_last_name->execute(array(htmlspecialchars($newLastName), $this->id));
        }
    }
    public function updateUserImagePath(string $newImagePath)
    {
        if($newImagePath != $this->getUserImagePath() && !empty($newImagePath)){
            $req = "UPDATE `user` SET `image_path`=? WHERE id = ?";
            $req_update_user_image_path = bdd()->prepare($req);
            $req_update_user_image_path->execute(array(htmlspecialchars($newImagePath), $this->id));
        }
    }
    public function updateUserPicture($file)
    {
        if ($file["type"] == "image/png" || $file["type"] == "image/jpeg") {
            $uploaddir = 'uploads_user_picture/';
            
            // Génération de l'emplacement du fichier
            $ext = explode('.', $file['name'])[sizeof(explode('.', $file['name']))-1];
            $uploadfile = $uploaddir.$this->id.'.'.$ext;
            
            // Supprimer l'ancienne image
            if (file_exists($uploadfile)) {
                unlink($uploadfile);
            }
            
            // Upload de la nouvelle image
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $this->updateUserImagePath("http://localhost/intranet/".$uploadfile);
            } else {
                echo "Image uploading failed.";
            } 
        }
    }
    public function setDisabled()
    {
        $req = "UPDATE `user` SET `disabled`=1 WHERE id = ?";
        $req_set_disabled = bdd()->prepare($req);
        $req_set_disabled->execute(array($this->id));
    }
    public function setActive()
    {
        $req = "UPDATE `user` SET `disabled`=0 WHERE id = ?";
        $req_set_active = bdd()->prepare($req);
        $req_set_active->execute(array($this->id));
    }
}
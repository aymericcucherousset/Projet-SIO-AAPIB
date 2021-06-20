<?php

class Job
{
    private int $id;

    public function __construct($id)
    {
        $this->id = htmlspecialchars($id);
    }

    public function getNameJob():string
    {
        $req = "SELECT job_label.job_label
        FROM job_label 
        WHERE job_id = ?";
        $req_get_name_job = bdd()->prepare($req);
        $req_get_name_job->execute(array(htmlspecialchars($this->id)));
        return $req_get_name_job->fetch()['job_label'];
    }

    public function getNbMembresDuJob():int
    {
        $req = "SELECT COUNT(*) AS total
        FROM job_member
        WHERE job_member.job_id = ?";
        $req_get_nb_membre_service = bdd()->prepare($req);
        $req_get_nb_membre_service->execute(array($this->id));
        return $req_get_nb_membre_service->fetch()['total'];
    }
}
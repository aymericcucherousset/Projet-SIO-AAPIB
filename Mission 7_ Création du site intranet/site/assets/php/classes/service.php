<?php

class Service
{
    private int $id;

    public function __construct($id)
    {
        $this->id = htmlspecialchars($id);
    }

    public function getNameService():string
    {
        $req = "SELECT service.name_service 
        FROM service 
        WHERE id_service = ?";
        $req_get_name_service = bdd()->prepare($req);
        $req_get_name_service->execute(array(htmlspecialchars($this->id)));
        return $req_get_name_service->fetch()['name_service'];
    }

    public function getNbMembresDuService():int
    {
        $req = "SELECT COUNT(*) AS total
        FROM service_member
        WHERE service_member.service_id = ?";
        $req_get_nb_membre_service = bdd()->prepare($req);
        $req_get_nb_membre_service->execute(array($this->id));
        return $req_get_nb_membre_service->fetch()['total'];
    }
}
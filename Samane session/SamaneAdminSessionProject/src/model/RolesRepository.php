<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
namespace src\model;

use libs\system\Model;

class RolesRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function add($role)
    {
        if($this->db != null)
        {
            $this->db->persist($role);
            $this->db->flush();

            return $role->getId();
        }
    }

    public function getAll(){
        if($this->db != null)
        {
            return $this->db->createQuery("SELECT r FROM Roles r")->getResult();// array of User objects
        }
    }

}

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
	
class UserRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getUser($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('User')->find(array('id' => $id));
		}
	}
	
	public function addUser($user)
	{
		if($this->db != null)
		{
			$this->db->persist($user);
			$this->db->flush();
		
			return $user->getId();
		}
	}
	
	public function deleteUser($id){
		if($this->db != null)
		{
			$user = $this->db->find('User', $id);
			if($user != null)
			{
				$this->db->remove($user);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateUser($user){
		if($this->db != null)
		{
			$getUser = $this->db->find('User', $user->getId());
			if($getUser != null)
			{
				$getUser->setValeur1($user->getValeur1());
				$getUser->setValeur2($user->getValeur2());
				$this->db->flush();

			}else {
				die("Objet ".$user->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeUser(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT u FROM User u")->getResult();
		}
	}
	
	public function listeUsersById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('User')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfUsersById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT t FROM User t WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfUsers()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('User')->findAll();
		}
	}
	
}
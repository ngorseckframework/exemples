<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\RolesRepository;

class UserRolesController extends Controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(isset($_SESSION['user_session'])) {
            $this->data['user'] = $_SESSION['user_session'];
        } else {
            $this->view->redirect('Login');
        }
    }

    public function liste()
    {
        $userdb = new UserRepository();
        $rolesdb = new RolesRepository();
        $this->data['users'] = $userdb->listeUser();
        $this->data['roles'] = $rolesdb->getAll();
        return $this->view->load("userroles/liste", $this->data);
    }

    public function affectation($id)
    {
        $userdb = new UserRepository();
        $rolesdb = new RolesRepository();
        $this->data['users'] = $userdb->listeUser();
        $this->data['roles'] = $rolesdb->getAll();
        $this->data['usersroles'] = $userdb->getUser($id)->getRoles();
        $this->data['idUser'] = $id;
        return $this->view->load("userroles/liste", $this->data);
    }
    public function affecter()
    {
        $userdb = new UserRepository();
        $user = $userdb->getUser($_POST['idUser']);
        if(isset($_POST['roles']))
        {
            if(count($_POST['roles']) > 0) {
                $roles = array();
                foreach ($_POST['roles'] as $nom)
                {
                    $roles[] = $userdb->getRoleByName($nom);
                }
                $user->setRoles($roles);//Modification des roles
                $userdb->updateUser($user);
            }
        } else {
            $roles = array();//si tous les roles sont a off
            $user->setRoles($roles);//Modification des roles
            $userdb->updateUser($user);
        }
        session_start();
        $_SESSION['user_session'] = $user;
        return $this->view->redirect('UserRoles/affectation/'.$_POST['idUser']);
    }


}
?>

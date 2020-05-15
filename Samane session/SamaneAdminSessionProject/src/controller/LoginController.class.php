<?php
use libs\system\Controller;
use src\model\UserRepository;
class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return $this->view->load("login");
    }
    public function logon()
    {
        $user = null;
        try {
            $userdb = new UserRepository();
            $user = $userdb->getUserByLogin($_POST['email'], $_POST['password']);
            if($user != null) {
                session_start();
                $roles = array();
                foreach ($user->getRoles() as $role)
                {
                    $roles[] = $role;
                }
                $user->setRoles($roles);
                $_SESSION['user_session'] = $user;

                return $this->view->redirect('Welcome');//controller
            } else {
                return $this->view->redirect('Login');//controller
            }
        }catch (Exception $ex) {
            $data['login_error'] = 'Email ou mot de passe incorrect !';
            return $this->view->load("login", $data);//view
        }

    }
    public function logout()
    {
        session_start();
        $_SESSION['user_session'] = '';
        session_destroy();
        return $this->view->load("login");
    }

    public function hasRole($nom)
    {
        $bol = 0;

        foreach ($this->roles as $role)
        {
            if($role->getNom() == $nom)
            {
                $bol = 1;
            }
        }
        return $bol;
    }

    public function register()
    {
        return $this->view->load("user/register");
    }

    public function createregister()
    {
        $userdb = new UserRepository();
        $user = new User();
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $roles = array();
        $roles[] = $userdb->getRoleByName('ROLE_USER');
        $user->setRoles($roles);
        $userdb->addUser($user);
        return $this->view->load("login");
    }
}
?>

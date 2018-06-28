<?php
class userController {

	private $userManager;
    private $user;

    public function __construct() {
        require('model/user.class.php');
        require_once('model/userManager.class.php');
        $this->userManager = new UserManager();
    }

    public function login() {
        $this->url->showHeaderDECON();
        include 'view/connexion.php'; 
    }

    public function signup() {
        $this->url->showHeaderDECON();
        include 'view/signup.php'; 
    }

    public function doLogin() {
        // Cette action teste l'existence d'un utilisateur de email $_POST['email'] et de password $_POST['password']
        // Le user extrait par le UserManager est renvoyé dans $result
        $email=$_POST['email']  ;
        $password=$_POST['password']  ;
        $result=$this->userManager->findOnebyMail($email, $password);

    	if ($result){            
			$_SESSION['user'] = $result;
            header('Location: index.php');
        }
        else {
            $info="Identifiant ou mot de passe incorrrect";
            $page="login";
            require('./view/main.php');
        }
    }


    public function doLogout(){
        // déconnection de l'utilisateur (destruction de la session et retour à la page d'accueil)
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
    }


    public function doSignup(){
        include_once("model/user.class.php");   

        function verifyForm($formContent){   
                $isComplete=true;
                foreach ($formContent as $value)
                {
                        if ($value==null)                
                            $isComplete=false;                    
                }
                return $isComplete;
            } 
        if (verifyForm($_POST)){ 
            //récupération des données du formulaire:
            $datas =array(
                'firstName' =>$_POST['firstName'],
                'name' =>$_POST['name'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
            );
            // création d'un nouvel utilisateur:        
            $new_user=new User($datas);

            // inscription dans la BD:
            $this->userManager->create($new_user); 

            // redirection vers l'authentification :   
            require('./view/connexion.php');          
        }
        else{
            $info= "Formulaire incomplet... Veuillez remplir tous les champs";  
            $page = 'creation';            
            require('./view/signup.php');   
        }   
    }

    // méthode pour obtenir la liste des utilisateurs (en vue d'en modifer les droits d'admin)
    public function listUser(){
        $listUsers=$this->userManager->findAll();
        $_SESSION['listUsers']=$listUsers;
        $page = 'listUsers';  
        require('./view/main.php'); 
    }

    // mise à jour des droit d'admin depuis la liste des utilisateurs
    public function update(){
        include_once("./model/User.class.php");   
        require_once('./model/UserManager.class.php');        
        
        if (isset ($_POST['email'])){
            $email = $_POST['email'];
            $adminStatus = $_POST["adminStatus"];
            if ($adminStatus)
                $right=1;
            else 
                $right=0;
                
            $listUsers=$_SESSION['listUsers'] ;    
            foreach ($listUsers as $user){                
                if ($user['email']==$email){
                    $userToUpdate=new User($user);
                    $userToUpdate->setAdmin($right);
                }                
            }
            $this->userManager->update($userToUpdate);
        }
        //header('location: index.php?ctrl=user&action=listUser');
        $this->listUser();
    }


}
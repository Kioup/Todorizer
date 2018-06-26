<?php

    class UserManager {
        
        private $db;
        private $user;
        
        public function __construct() {
            require_once('./model/db.class.php');
            require_once('./model/user.class.php');
            $connection = new Connection();
            $this->user = new User();
            $this->db = $connection->get_connection();
        }
        
        public function create() {
            
            $this->hydrate();
            
            $create = $this->db->prepare(
	           'INSERT INTO user ( name, firstname, email, password ) VALUES ( :name, :firstname, :email, :password )'
            );
            
            $data = [
                'name' => $this->user->getName(),
                'firstname' => $this->user->getFirstName(),
                'email' => $this->user->getEmail(),
                'password' => md5($this->user->getPassword())
            ];
            
            $create = $create->execute($data);
            
            return $this->user;
	   }
        
       public function connect() {
            
            $this->hydrate();

            $connect = $this->db->query(
                'SELECT * FROM user'
            );
            $connect = $connect->fetchall(PDO::FETCH_ASSOC);
           
           echo md5($this->user->getPassword());
           
            foreach($connect as $i) {
                
                var_dump($i);
                
                if (($this->user->getEmail() == $i["email"]) && (md5($this->user->getPassword()) == $i["password"])) {
                    $this->user->hydrate($i);
                    $_SESSION["user"] = serialize($this->user);
                    return $this->user;
                }
            }
           
            return false;
        }
        
        public function hydrate() {
            
            $this->user->hydrate($_POST);
            
        }
        
//        public function update() {
//            
//            $update = $this->db->prepare(
//                'UPDATE user SET
//                   firstName = :firstName,
//                   name = :name,
//                   postalCode = :postalCode,
//                   country = :country,
//                   city = :city,
//                   address = :address,
//                   email = :email,
//                   password = :password,  
//                   pseudo = :pseudo 
//                WHERE id = :id'
//            );
//            $user = $_SESSION["data"];
//            $update->execute(
//                array(
//                    'pseudo' => $user->getPseudo(),
//                    'email' => $user->getEmail(),
//                    'password' => $user->getPassword(),
//                    'address' => $user->getAddress(),
//                    'city' => $user->getCity(),
//                    'country' => $user->getCountry(),
//                    'postalCode' => $user->getPostalCode(),
//                    'lastName' => $user->getLastName(),
//                    'firstName' => $user->getFirstName(),
//                    'id' => $user->getId()
//                )
//            );
//            $_SESSION["name"]=$user->getPseudo();
//        
//        }
        
//        public function findAll() {
//            $all = $this->db->query('SELECT * FROM crud_1');
//            $all = $all->fetchall(PDO::FETCH_ASSOC);
//            return $all;
//        }
//        
//        public function findOne($search) {
//            $one = $this->db->prepare(
//                "SELECT * FROM crud_1 WHERE 
//                    pseudo LIKE :search OR
//                    city LIKE :search OR
//                    country LIKE :search OR
//                    email LIKE :search
//                "
//            );
//            $one -> bindValue('search', "%".$_POST["search"]."%", PDO::PARAM_STR);
//            $one -> execute();
//            $one = $one->fetchall(PDO::FETCH_ASSOC);
//            return $one;
//        }
//        
//        public function delete() {
//            $delete = $this->db->prepare('DELETE FROM crud_1 WHERE id = ?');
//            $delete->execute(array($_SESSION["data"]->getId()));
//        }
    }

?>
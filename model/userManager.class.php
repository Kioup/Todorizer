<?php

    class UserManager {
        
        public function __construct() {
            require_once('./model/db.class.php');
            $connection = new Connection();
            $db = $connection->get_connection();
        }
        
        
        public function create(User $user) {
            
            $create = $this->db->prepare(
	           'INSERT INTO user ( name, firstname, avatar, email, password ) VALUES ( :name, :firstname, :avatar, :email, :password )'
            );

            $create->execute(
                [
                    'name' => $user->getName(),
                    'firstname' => $user->getFirstName(),
                    'avatar' => $user->getAvatar(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword()
                    
                ]
            );
	   }
        
       public function connect(User $user) {
            $connect = $this->db->query(
                'SELECT email, password FROM user'
            );
            $connect = $connect->fetchall(PDO::FETCH_ASSOC);
            foreach($connect as $i){
                if (($user->getEmail() == $i["email"]) && ($user->getPassword() == $i["password"])) {
                    $user->hydrate($i);
                    $_SESSION["user"] = $user;
                }
            }
           return $user;
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
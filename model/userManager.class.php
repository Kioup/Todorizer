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
           
            foreach($connect as $i) {
                
                if (($this->user->getEmail() == $i["email"]) && (md5($this->user->getPassword()) == $i["password"])) {
                    $this->user->hydrate($i);
                    $_SESSION["user"] = serialize($this->user);
                    return $this->user;
                }
            }
           
            return false;
        }
        
        public function update($user) {
             
            $this->user = $user;
            $this->hydrate();
            
            $update = $this->db->prepare(
                'UPDATE user SET name = :name, firstname = :firstname, email = :email WHERE id = :id'
            );
            
            $data = [
                'name' => $this->user->getName(),
                'firstname' => $this->user->getFirstName(),
                'email' => $this->user->getEmail(),
                'id' => $this->user->getId()
            ];
            
            $update = $update->execute($data);
            return $this->user;            
            
        }
        
        public function updatePwd($pwd, $id) {
            
            $upPwd = $this->db->prepare('UPDATE user SET password = ? WHERE id = ?');
            return $upPwd->execute(array(md5($pwd),$id));   
                
        }
            
        public function hydrate() {
            
            $this->user->hydrate($_POST);
            
        }
        
        
        public function delete($id) {
            $delete = $this->db->prepare('DELETE FROM user WHERE id = ?');
            $delete->execute(array($id));
        }
    }

?>
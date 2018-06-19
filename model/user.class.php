<?php
    class User {
        
        /* Var */
        
        private $id;
        private $email;
        private $password;
        private $name;
        private $firstName;
        private $avatar;
        
        /* Setter */
        
        public final function setEmail($newEmail) {
            $this->email = $newEmail;
        }	
        public final function setPassword($newPassword) {
            $this->password = $newPassword;
        }
        public final function setName($newName) {
            $this->name = $newName;
        }
        public final function setFirstName($newFirstName) {
            $this->avatar = $newAvatar;
        }
        public final function setAvatar($newAvatar) {
            $this->avatar = $newAvatar;
        }
        
        /* Getter */
        
        public final function getId() {
            return $this->id;
        }
        public final function getEmail() {
            return $this->email;
        }
        public final function getPassword() {
            return $this->password;
        }
        public final function getName() {
            return $this->pseudo;
        }
        public final function getFirstName() {
            return $this->firstName;
        }
        public final function getAvatar() {
            return $this->avatar;
        }
        
        /* Hydratation */
        
        public function hydrate($donnees){
            foreach($donnees as $key => $value){
                $this->$key=$value;
            }
        }
        
    }
?>
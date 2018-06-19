<?php
    class Project {
        
        /* Var */
        
        private $id;
        private $date;
        private $type;
        private $content;
        private $id_node;
        private $id_owner;
        
        /* Setter */
        
        public final function setDate($newDate) {
            $this->date = $newDate;
        }	
        public final function setIcon($newType) {
            $this->type = $newType;
        }
        public final function setContent($newContent) {
            $this->content = $newContent;
        }
        public final function setIdNode($newIdNode) {
            $this->id_node = $newIdNode;
        }
        public final function setIdOwner($newIdOwner) {
            $this->id_owner = $newIdOwner;
        }
        
        /* Getter */
        
        public final function getId() {
            return $this->id;
        }
        public final function getDate() {
            return $this->date;
        }
        public final function getType() {
            return $this->type;
        }
        public final function getContent() {
            return $this->content;
        }
        public final function getIdNode() {
            return $this->id_node;
        }
        public final function getIdOwner() {
            return $this->id_owner;
        }
        
        /* Hydratation */
        
        public function hydrate($donnees){
            foreach($donnees as $key => $value){
                $this->$key=$value;
            }
        }
        
    }
?>
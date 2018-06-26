<?php
    class Project {
        
        /* Var */
        
        private $id;
        private $name;
        private $icon;
        private $icon_color;
        private $description;
        private $id_owner;
        private $node_list;
        
        public function __construct () {
            
            require_once(((isset($_POST['ajax'])) ? '.' : '') . './model/node.class.php');
            $this->node_list = [];
        }
        
        /* Setter */
        
        public final function setName($newName) {
            $this->name = $newName;
        }	
        public final function setIcon($newIcon) {
            $this->icon = $newIcon;
        }
        public final function setIconColor($newIconColor) {
            $this->icon_color = $newIconColor;
        }
        public final function setDescription($newDescription) {
            $this->description = $newDescription;
        }
        public final function setIdOwner($newIdOwner) {
            $this->id_owner = $newIdOwner;
        }
        public final function setNodeList($newNodeList) {
            $this->node_list = $newNodeList;
        }
        
        public final function addNodeToList($newNode, $id) {
            $this->node_list[$id] = $newNode;
        }
        
        public final function removeNode($id) {
            $tab = $this->getNodeList();
            unset($tab[$id]);
            $this->setNodeList($tab);
        }
        
        /* Getter */
        
        public final function getId() {
            return $this->id;
        }
        public final function getName() {
            return $this->name;
        }
        public final function getIcon() {
            return $this->icon;
        }
        public final function getIconColor() {
            return $this->icon_color;
        }
        public final function getDescription() {
            return $this->description;
        }
        public final function getIdOwner() {
            return $this->id_owner;
        }
        public final function getNodeList() {
            return $this->node_list;
        }
        public final function getNode($id) {
            return $this->node_list[$id];
        }
        
        /* Hydratation */
        
        public function hydrate($donnees){
            foreach($donnees as $key => $value){
                $this->$key=$value;
            }
        }
        
    }
?>
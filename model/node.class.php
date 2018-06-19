<?php
    class Node {
        
        /* Var */
        
        private $id;
        private $description;
        private $title;
        private $id_project;
        private $start_date;
        private $end_date;
        private $node_path;
        private $id_parent;
        private $id_child;
        private $nb_children;
        private $priority;
        private $progress;
        
        /* Setter */
        
        public final function setDescription($newDescription) {
            $this->description = $newDescription;
        }
        public final function setTitle($newTitle) {
            $this->title = $newTitle;
        }
        public final function setIdProject($newIdProject) {
            $this->id_project = $newIdProject;
        }
        public final function setStartDate($newStartDate) {
            $this->start_date = $newStartDate;
        }
        public final function setEndDate($newEndDate) {
            $this->end_date = $newEndDate;
        }
        public final function setNodePath($newNodePath) {
            $this->node_path = $newNodePath;
        }
        public final function setIdParent($newIdParent) {
            $this->id_parent = $newIdParent;
        }
        public final function setIdChild($newIdChild) {
            $this->id_child = $newIdChild;
        }
        public final function setNbChildren($newNbChildren) {
            $this->nb_children = $newNbChildren;
        }
        public final function setPriority($newPriority) {
            $this->priority = $newPriority;
        }
        public final function setProgress($newProgress) {
            $this->progress = $newProgress;
        }
        
        /* Getter */
        
        public final function getId() {
            return $this->id;
        }
        public final function getDescription() {
            return $this->description;
        }
        public final function getTitle() {
            return $this->title;
        }
        public final function getIdProject() {
            return $this->id_project;
        }
        public final function getStartDate() {
            return $this->start_date; 
        }
        public final function getEndDate() {
            return $this->end_date; 
        }
        public final function getNodePath() {
            return $this->node_path; 
        }
        public final function getIdParent() {
            return $this->id_parent;
        }
        public final function getIdChild() {
            return $this->id_child;
        }
        public final function getNbChildren() {
            return $this->nb_children;
        }
        public final function getPriority() {
            return $this->priority;
        }
        public final function getProgress() {
            return $this->progress;
        }


        
        /* Hydratation */
        
        public function hydrate($donnees){
            foreach($donnees as $key => $value){
                $this->$key=$value;
            }
        }
        
    }
?>
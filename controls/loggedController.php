<?php

Class LoggedController{

    private $nodeManager ;
    private $projectManager;
    private $url;
    private $id_user;

    public function __construct($id_user) {
        require 'model/projectManager.class.php';
        require 'model/nodeManager.class.php';
        require 'controls/projectController.class.php';
        require 'controls/nodeController.class.php';
        require_once(__MODELROOT__ . 'url.class.php');        
        $this->nodeManager= new NodeManager();
        $this->projectManager=new ProjectManager();
        $this->url=new URL();
        $this->id_user=$id_user;
    }   


    public function displayAllProjects(){
        $projectList=$this->projectManager->extract_allProjects($this->id_user);
        $this->url->showHeaderCON();
        include 'view/projectList.php'; 
    }

    public function displayProjectNodes($id_project){
        $project=$this->projectManager->extract_Project($id_project);
        $nodeList=$this->nodeManager->extract_ProjectNodes($project);

        $sortedNodeList=$this->sortNodeList($nodeList);
        $project->setNodeList($sortedNodeList);
        
       // $project->setNodeList($nodeList);
        $this->url->showHeaderCON();
        include 'view/nodeList.php'; 
    }

    public function displayChildNodes($id_project,$currentNodePath){
        $nb_children=null;
        $project=$this->projectManager->extract_Project($id_project);
        $nodeList=$this->nodeManager->extract_ProjectNodes($project);

        // conversion de la liste de noeuds en tableau associatif:
        $sortedNodeList=$this->sortNodeList($nodeList);

        // récup du noeud courrant:
        $currentNode=$sortedNodeList[$currentNodePath];

        // récup des noeuds enfants de la génération suivante:
        $nb_children=$currentNode->getNbChildren();

        $this->url->showHeaderCON();        
        include 'view/childNodeList.php';      
    }

    private function sortNodeList($nodeList){
        $sortedNodeList=array();
        foreach ($nodeList as $node){
            $sortedNodeList[$node->getNodePath()]=$node;
        }
        return $sortedNodeList;
    }

}



?>
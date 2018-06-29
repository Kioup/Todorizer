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
        $this->projectController=new ProjectController();
        $this->nodeController=new NodeController();
        $this->url=new URL();
        $this->id_user=$id_user;
    }   

    public function deleteProject($id_project){
        $this->projectManager->deleteProject($id_project);
    }

    public function displayAllProjects(){
        $projectList=$this->projectManager->extract_allProjects($this->id_user);
        $this->url->showHeaderCON();
        include 'view/projectList.php'; 
    }
    public function createNewProject(){
        $projectList=$this->projectManager->extract_allProjects($this->id_user);
        $id = false;
        if ($projectList) {
            foreach ($projectList as $extractedProject){
                if ($extractedProject->getName()=="") $id = $extractedProject->getId();
            } 
        }
        
        if(!$id) $id=$this->projectManager->insert($this->id_user);
        $this->displayRootNodes($id);
    }

    public function update_start_dateNode($date, $id_node){
        unset( $_SESSION['project']);
        $this->nodeManager->update_start_dateNode($date,$id_node);
    }

    public function update_end_dateNode($date, $id_node){
        unset( $_SESSION['project']);
        $this->nodeManager->update_end_dateNode($date,$id_node);
    }

    public function updateProjectIcon($id_project, $iconPath){
        unset( $_SESSION['project']);
        $this->projectManager->updateProjectIcon($id_project, $iconPath);
    }

    public function updateProjectColor($id_project, $color){
        unset( $_SESSION['project']);        
        $this->projectManager->updateProjectColor($id_project, $color);
    }

    public function editProject($id_project){    
        if (isset($_SESSION['project'])) {
            $project = unserialize($_SESSION['project']);
        } else  {
            $project=$this->projectManager->extract_Project($id_project);
            $nodeList=$this->nodeManager->extract_ProjectNodes($project);
            $_SESSION['project'] = serialize($project);
        }

        $this->url->showHeaderCON();
        include 'view/projectEdit.php'; 
    }

    public function update_nodeElement($elementName, $elementValue, $node_Id){   
        unset( $_SESSION['project']);        
        $this->nodeManager->update_nodeElement($elementName, $elementValue, $node_Id);
    }
    
    public function editNode($id_project, $id_node){    
        if (isset($_SESSION['project'])) {
            $project = unserialize($_SESSION['project']);
            $nodeList = $project->getNodeList();
        } else  {
            $project=$this->projectManager->extract_Project($id_project);
            $nodeList=$this->nodeManager->extract_ProjectNodes($project);
            $_SESSION['project'] = serialize($project);
        }
        
        // conversion de la liste de noeuds en tableau associatif:
        $sortedNodeList=$this->sortNodeList($nodeList);

        // récup du noeud courrant:
        $currentNode=$sortedNodeList[$id_node];

        $this->url->showHeaderCON();
        include 'view/nodeEdit.php'; 
    }
    
    public function displayRootNodes($id_project){
        $p = false;
        if (isset($_SESSION['project']) && !empty($_SESSION['project'])) {
            $project = unserialize($_SESSION['project']);
            if ($project->getId() != $id_project || !$project->getNodeList()) $p = true;
        } else {
            $p = true;
        }
        if ($p) {
            $project=$this->projectManager->extract_Project($id_project);
            if ($project) {
                $nodeList=$this->nodeManager->extract_ProjectNodes($project);
                if ($nodeList) {
                    $sortedNodeList=$this->sortNodeList($nodeList);
                    $project->setNodeList($sortedNodeList);
                }
                $_SESSION['project']=serialize($project); 
            } else {
                $this->createNewProject();
            }
        }
        $this->url->showHeaderCON();
        include 'view/rootNodeList.php'; 
    }

    public function displayNodes($id_project,$currentNodePath){
        if (isset($_SESSION['project']) && !empty($_SESSION['project'])) {
            $project = unserialize($_SESSION['project']);
            if ($project->getId() != $id_project || !$project->getNodeList()) {
                $p = true;
            } else {
                 $nodeList = $project->getNodeList();
            }
        } else {
            $p = true;
        }
        if ($p) {
            $project=$this->projectManager->extract_Project($id_project);
            if ($project) {
                $nodeList=$this->nodeManager->extract_ProjectNodes($project);
                if ($nodeList) {
                    $sortedNodeList=$this->sortNodeList($nodeList);
                    $project->setNodeList($sortedNodeList);
                }
                $_SESSION['project']=serialize($project); 
            } else {
                $this->displayRootNodes();
            }
        }

        // conversion de la liste de noeuds en tableau associatif:
        $sortedNodeList=$this->sortNodeList($nodeList);

        // récup du noeud courrant:
        $currentNode=$sortedNodeList[$currentNodePath];

        // récup des noeuds enfants de la génération suivante:
        $nb_children=$currentNode->getNbChildren();

        $this->url->showHeaderCON();        
        include 'view/nodeList.php';      
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
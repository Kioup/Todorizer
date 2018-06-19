<?php

class ProjectController{

    private $project;

    public function __construct(){
        require_once('./model/project.class.php');
        
    }

    public function addProject(){        
            $this->project = new Project();
            $this->setProject();        
    }
    
    public function updateProject($project){
        $this->project=$project;
    }

    public function setProject(){

        $data=array();
        if (isset($_POST['name'])){
            $data['name']=$_POST['name'];            
        }
        else{
            $data['name']="Untitled";
        }   
        if (isset($_POST['icon'])){
            $data['icon']=$_POST['icon'];            
        }
        if (isset($_POST['icon_color'])){
            $data['icon_color']=$_POST['icon_color'];            
        }
        if (isset($_POST['description'])){
            $data['description']=$_POST['description'];            
        }
        if (isset($_POST['id_owner'])){
            $data['id_owner']=$_POST['id_owner'];            
        }
        $this->project->hydrate($data);
    }

    public function addNode(){
        require_once('./model/node.class.php');
        $node=new Node();
        $this->project->addNodeToList($node);        
    }
    
    public function getProject(){
        return $this->project;
    }

    public function testProject(){
      //  echo "test:";
        echo $this->project->getName();
    }


}

?>
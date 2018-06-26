 <?php

class ProjectController {

    private $project;

    public function __construct(){
        require_once(__MODELROOT__ . 'project.class.php');
        require_once(__MODELROOT__ . 'node.class.php');
    }

    public function addProject(){        
        return $this->setProject(new Project());        
    }

    public function setProject($project){

        $data = [];
        
        if (isset($_POST['name'])){
            $data['name']=$_POST['name'];            
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
        $project->hydrate($data);
        return $project;
    }

    public function addNode($project, $node){
        $id = (max(array_keys($project->getNodeList())) + 1);
        $node->setId($id);
        return $this->updateNode($project, $node, $id);
    }
    
    public function updateNode($project, $node, $id) {
        $project->addNodeToList($node, $id);
        return $project;
    }

    public function testProject($project){
        echo " - Project: " . $project->getName();
    }


}

?>
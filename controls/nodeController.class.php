<?php

class NodeController{

    public function __construct(){
        $dir = './model/';
        if (isset($_POST['ajax'])) $dir = '.' . $dir;
        require_once($dir.'project.class.php');
        require_once($dir.'node.class.php');
    }

    public function createNode(){        
        $node = new Node();
        return $node;
    }

    public function setNode($node,$node_path){

        $data=array();
        if (isset($_POST['title'])){
            $data['title'] = $_POST['title'];
        }
        if (isset ($_POST['description'])){
            $data['description']=$_POST['description'];
        }
        $data['node_path'] = $node_path;
        $node->hydrate($data);
        return $node;
    }

    public function addChildNode($parentNode, $childNode){
        $parentNode->addNodeToList($childNode);
        return $parentNode;
    }

    public function testNode($node){
        echo "test Node: " .$node->getTitle();
    }

}
    

?>
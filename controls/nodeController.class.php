<?php

class NodeController{


    
    public function __construct(){
        require_once('./model/node.class.php');       
        require_once('./model/project.class.php');       
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
        $data['parent_node'] = $node_path;
        $node->hydrate($data);
        return $node;
    }

    public function addChildNode(&$parentNode, $childNode){
        $parentNode->addNodeToList($childNode);
        return $parentNode;
    }

    public function testNode($node){
        echo "test Node: " .$node->getTitle();
    }

}
    

?>
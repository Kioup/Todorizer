<?php
class NodeManager {

    private $PDO;
    
    private $db;

    public function __construct() {
        require_once(__MODELROOT__.'db.class.php');
        require_once(__MODELROOT__.'project.class.php');
        $connection = new Connection();
        $this->db = $connection->get_connection();
    }


    public function insert(Node $node) {            
        $create = $this->db->prepare(
           'INSERT INTO node ( title, description, id_project, node_path, id_parent, id_child, nb_children ) VALUES ( :title, :description, :id_project, :node_path, :id_parent, :id_child, :nb_children )'
        );
        $create->execute(
            [
                'title' => $node->getTitle(),
                'description' => $node->getDescription(),
                'id_project' => $node->getIdProject(),
                'node_path' => $node->getNodePath(),
                'id_parent' => $node->getIdParent(),
                'start_date' => $node->getStartDate(),
                'end_date' => $node->getEndDate(),
                'id_child' => $node->getIdChild(),
                'nb_children' => $node->getNbChildren(),
                'progress' => $node->getProgress(),                  
            ]
        );
    }

    public function extract_ProjectNodes($project){
        $id_project=$project->getId();
        $request = $this->db->query('SELECT * FROM node WHERE id_project='.$id_project );
        $request = $request->fetchall(PDO::FETCH_CLASS,'Node');
        return $request;
    }
       
}


?>
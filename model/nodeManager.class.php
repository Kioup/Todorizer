<?php
class NodeManager {

    private $PDO;
    
    private $db;

    public function __construct() {
        require_once(__MODELROOT__.'db.class.php');
        require_once(__MODELROOT__.'project.class.php');
        require_once(__MODELROOT__.'node.class.php');
        
        $connection = new Connection();
     //   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $connection->get_connection();
    }


    public function insert(Node $node) {            
        $create = $this->db->prepare(
           'INSERT INTO node ( title, id_project, id_parent, node_path, id_child ) VALUES ( :title, :id_project, :id_parent, :node_path, :id_child )'
        );
        $create = $create->execute(
            [
                'title' => $node->getTitle(),
                'id_project' => $node->getIdProject(),
                'id_parent' => ($node->getIdParent() ?: NULL),
                'node_path' => $node->getNodePath(),
                'id_child' => $node->getIdChild(),
            ]
        );
        //var_dump($create);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function findRootBrothers($id_project){
        $request = $this->db->prepare(
            'SELECT MAX(id_child) FROM node WHERE id_project = ? AND id_parent IS NULL'
         );
         $request->execute(
             [
                 $id_project                            
             ]
         );
        $request = $request->fetch(PDO::FETCH_ASSOC);            
        return $request;
    }

    public function getNode($id_parent){
        $request = $this->db->prepare(
            'SELECT * FROM node WHERE id = ?'
         );
         $request->execute(
             [ $id_parent ]
         );
        $request = $request->fetchAll(PDO::FETCH_CLASS,'Node');     
        return $request[0];
    }

    public function findBrothers($id_parent){
        $request = $this->db->prepare(
            'SELECT MAX(id_child) FROM node WHERE id_parent = ?'
         );
         $request->execute(
             [ $id_parent ]
         );
        $request = $request->fetchAll(PDO::FETCH_ASSOC);       
       // print_r($request);     
        
        return $request[0];
    }

    public function update_title($title, $node_Id){
        $update= $this->db->prepare(
            'UPDATE node SET title = :title WHERE id = :id'
         );
         $update->execute(
             [
                 'title' => $title,
                 'id' => $node_Id                              
             ]
         );
    }

    public function update_nb_children($id,$nb_children,$children){
        $update= $this->db->prepare(
            'UPDATE node SET nb_children = :nb_children WHERE id = :id'
         );
         $update->execute(
             [
                 'nb_children' => $nb_children+$children,
                 'id' => $id                              
             ]
         );
    }

    public function delete_node($node_Id){      
        $delete= $this->db->prepare(
            'DELETE FROM node WHERE id = ?'
         );
         $delete->execute( [$node_Id] );
    }


    public function update_description($description, $node_Id){
        $update= $this->db->prepare(
            'update node SET description = :description WHERE id = :id'
         );
         $update->execute(
             [
                 'description' => $description,
                 'id' => $node_Id                              
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
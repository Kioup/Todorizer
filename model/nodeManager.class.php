<?php
class NodeManager {

    private $PDO;
    
    private $db;

    public function __construct() {
        require_once(__MODELROOT__.'db.class.php');
        require_once(__MODELROOT__.'project.class.php');
        require_once(__MODELROOT__.'node.class.php');
        
        $connection = new Connection();
        
        $this->db = $connection->get_connection();
        
        //Debug
        //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Create Node
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
        $id = $this->db->lastInsertId();
        return $id;
    }

    //Return id_child max of root node
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

    //Return node
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

    //Return id child max of node
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


    // ex: 
    // elementName= "title", "start_date", etc.
    // elementValue= "mon beau titre", "27/06/2018", etc.

    public function update_nodeElement($elementName, $elementValue, $node_Id){
        $update= $this->db->prepare(
            'UPDATE node SET '.$elementName.' = :elementValue WHERE id = :id'
         );
         $update->execute(
             [
                 'elementValue' => $elementValue,
                 'id' => $node_Id                              
             ]
         );        
    }

    public function update_start_dateNode($date, $node_Id){
        $update= $this->db->prepare(
            'UPDATE node SET start_date = :date WHERE id = :id'
         );
         $update->execute(
             [
                 'date' => $date,
                 'id' => $node_Id                              
             ]
         );  
    }
    public function update_end_dateNode($date, $node_Id){
        $update= $this->db->prepare(
            'UPDATE node SET end_date = :date WHERE id = :id'
         );
         $update->execute(
             [
                 'date' => $date,
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

    //Remove node
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

    //Return all nodes of one project
    public function extract_ProjectNodes($project){
        $id_project=$project->getId();
        $request = $this->db->query('SELECT * FROM node WHERE id_project='.$id_project );
        $request = $request->fetchall(PDO::FETCH_CLASS,'Node');
        return $request;
    }
       
}


?>
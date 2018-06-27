<?php
class ProjectManager {

    private $db;
    
        public function __construct() {
            require_once(__MODELROOT__.'db.class.php');
            require_once(__MODELROOT__.'project.class.php');
            $connection = new Connection();
            $this->db = $connection->get_connection();
        }
        
        
        public function insert($id_owner) {            
            $create = $this->db->prepare(
               'INSERT INTO project ( id_owner ) VALUES ( :id_owner )'
            );
            $create->execute(
                [ 'id_owner' => $id_owner ]
            );
            $id=$this->db->lastInsertId();
            return $id;
        }

        public function update($project_Id, $name){
            $update= $this->db->prepare(
                'update project SET name = :name WHERE id = :id'
             );
             $update->execute(
                 [
                     'name' => $name,
                     'id' => $project_Id                              
                 ]
             );
        }


        // extraction de tous les projets d'un user:
         public function extract_allProjects($id_owner) {
            $request = $this->db->prepare(
                'SELECT * FROM project WHERE id_owner = ?'
             );
             $request->execute(
                 [
                     $id_owner                            
                 ]
             );
            $request  = $request->fetchall(PDO::FETCH_CLASS,'Project');              
            return $request;        
        } 


    
        // extraction d'un projets à partir de son id:
        public function extract_Project($id) {
            $request = $this->db->prepare(
                'SELECT * FROM project WHERE id = ?'
             );
             $request->execute(
                 [
                     $id                            
                 ]
             );
            $request = $request->fetchObject('Project');            
            return $request;
        }
    
        
    }


?>
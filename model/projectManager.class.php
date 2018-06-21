<?php
class ProjectManager {

    private $db;
    
        public function __construct() {
            require_once('./model/db.class.php');
            require_once('./model/project.class.php');
            $connection = new Connection();
            $this->db = $connection->get_connection();
        }
        
        
        public function insert(Project $project) {            
            $create = $this->db->prepare(
               'INSERT INTO project ( name, id ) VALUES ( :name, :id )'
            );
            $create->execute(
                [
                    'name' => $project->getName(),
                    'id' => $project->getId()                              
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
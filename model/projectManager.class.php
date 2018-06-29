<?php
class ProjectManager {

    private $db;
    
        public function __construct() {
            require_once(__MODELROOT__.'db.class.php');
            require_once(__MODELROOT__.'project.class.php');
            $connection = new Connection();
            $this->db = $connection->get_connection();
        }
        
        //Remove project
        public function deleteProject($project_Id){
            $delete= $this->db->prepare(
                'DELETE FROM project WHERE id = ?'
             );
             $delete->execute( [$project_Id] );
        }

        //Create project
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

        //Update project
        public function update($elementName, $elementValue, $project_Id){
            $update= $this->db->prepare(
                'UPDATE project SET '.$elementName.' = :elementValue WHERE id = :id'
             );
             $update->execute(
                 [
                     'elementValue' => $elementValue,
                     'id' => $project_Id                              
                 ]
             );        
        }

        //Update project icon
        public function updateProjectIcon($project_Id, $iconPath){
            $update= $this->db->prepare(
                'update project SET icon = :icon WHERE id = :id'
             );
             $update->execute(
                 [
                     'icon' => $iconPath,
                     'id' => $project_Id                              
                 ]
             );
        }

        //Update project color
        public function updateProjectColor($project_Id, $icon_color){
            $update= $this->db->prepare(
                'update project SET icon_color = :icon_color WHERE id = :id'
             );
             $update->execute(
                 [
                     'icon_color' => $icon_color,
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
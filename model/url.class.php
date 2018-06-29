<?php

    class Url {
        
        //private $env;
        
        public function __construct() {
            
            //$this->setEnv();
            
        }
        
        public function get($page) {
                
            echo $_SERVER['REQUEST_URI'] . "redirect.php?page=" . $page;
                            
        }
        
//        private function setEnv() {
//            
//            $this->env = (defined(__ENV__)) ? __ENV__ : ((strstr($_SERVER['HTTP_HOST'],'localhost')) ? 'dev' : 'prod') ;
//            $_SESSION["env"] = $this->env;
//
//        }
        

        //Include header
        public function showHeader() {
            
            $url = new Url();
            
            include('assets/header.php');

            if (isset($_SESSION['user'])) {

                include('assets/aside.php');
                include('assets/header2.php');

            } else {

                include('assets/aside2.php');        
                include('assets/header3.php');

            }
        }
        
        //Logged header
        public function showHeaderCON(){
            $url = new Url();
            
            include('assets/header.php');
            include('assets/aside.php');
            include('assets/header2.php');

        }

        //Loggout header
        public function showHeaderDECON(){
            $url = new Url();
            
            include('assets/header.php');
            include('assets/aside2.php');        
            include('assets/header3.php');

        }
        
//        public function showPage($page) {
//            
//            
//            
//        }       

    }

?>
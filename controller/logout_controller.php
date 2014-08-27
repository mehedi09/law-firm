<?php

    class Logout_controller
    {
        public function __construct() 
        {
            include'../controller/session_userInfo_controller.php';
            include'../model/db_connection_model.php';
    
            $session_userInfo_controller=new Session_userInfo_controller();
            $db_connection_model=new Db_connection_model();
            
           // $db_connection_model->online_status_false();// for Offline

            $logout=  session_destroy();

           

            if($logout==TRUE)
            {
                echo"logout<br/>";

                header('Location:../index.php');
            }
            else
            {
                echo"cant logout<br/>";
            }
        }
    }
    
    $logout_controller=new Logout_controller();
?>
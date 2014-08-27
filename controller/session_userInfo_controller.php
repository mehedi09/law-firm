<?php
   
    class Session_userInfo_controller
    {
        public function __construct() 
        {
            session_start();
    
                $_SESSION['id']=$_POST['id'];
                $_SESSION['pass']=$_POST['pass'];
                $_SESSION['loggedIn']=1;
                $_SESSION['online']=1;
            

            //echo "email=".$_SESSION['email']."  "."pass==".$_SESSION['pass']."<br/>";
        }
    }
    
    //$session_userInfo_controller=new Session_userInfo_controller();
?>

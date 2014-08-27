
<?php
   
    class Login_check_controller
    {
        public function __construct() 
        {
            include'../controller/session_userInfo_controller.php';
            include'../model/db_connection_model.php';
            
            $session_userInfo_controller=new Session_userInfo_controller();
            $db_connection_model =new Db_connection_model();
    
            $check=$db_connection_model->loginCheck($_POST['id'],$_POST['pass']);
            
            //echo"check=".$check;
            
            if($check=="admin")
            {
               header('Location:../view/admin_view.php');
                //echo"check=".$check."<br/>";
            }
            
            else if($check=="company_admin")
            {
               header('Location:../view/company_admin_view.php');
            }
           
            else
            {
                header('Location:../view/fail_view.php');
                //echo"check=".$check."<br/>";
            }
            
        }
    }
    
    $login_check_controller=new Login_check_controller();


?>

<?php
    class View_all_user_controller
    {
        public function view_all_user() //return all user account detail
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $view_all_user=$admin_model->view_all_user();
            
            if($view_all_user)
            {
                return $view_all_user;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

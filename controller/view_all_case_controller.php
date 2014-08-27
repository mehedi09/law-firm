<?php
    class View_all_case_controller
    {
        public function view_all_case() //return all case info
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $view_all_case=$admin_model->view_all_case();
            
            if($view_all_case)
            {
                return $view_all_case;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

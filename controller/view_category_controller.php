<?php
    class View_category_controller 
    {
        public function view_all_category() //it returns all category & sub_category name
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $view_all_category=$admin_model->view_all_category();
            
            if($view_all_category)
            {
                return $view_all_category;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

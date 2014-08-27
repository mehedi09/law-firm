<?php
    class Add_sub_category_controller
    {
        public function add_sub_category($category_name,$sub_category_name) 
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $insert_sub_category=$admin_model->add_sub_category($category_name, $sub_category_name);
            
            if($insert_sub_category)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

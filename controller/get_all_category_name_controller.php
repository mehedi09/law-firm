
<?php

    class Get_all_category_name_controller
    {
        public function get_all_category_name() 
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $all_category_name=$admin_model->get_all_category_name();

            if($all_category_name==TRUE)
            {
                return $all_category_name;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

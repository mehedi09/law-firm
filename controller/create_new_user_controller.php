<?php

    class Create_new_user_controller
    {
        public function create_new_user($user_id,$pass,$user_name,$user_email) 
        {
            //echo "$case_submitted_date<br/>";
           
            include'../model/admin_model.php';
            
            $admin_model =new Admin_model();

            $create_new_user=$admin_model->create_new_user($user_id,$pass, $user_name, $user_email);

            if($create_new_user==TRUE)
            {
               
                //header('Location:../view/add_category_view.php');    
                return TRUE;
            }
            else
            {
                echo"cant create new user <br/>";
            }
        }
    }
?>

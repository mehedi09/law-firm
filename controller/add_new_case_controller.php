<?php

    class Add_new_case_controller
    {
        public function add_new_case($ref,$parties,$present_status,
                $next_step,
                $select_category,$select_sub_category,$file_location,
                $case_submitted_date,$person_assigned) 
        {
            //echo "$case_submitted_date<br/>";
            $date=$case_submitted_date;
            
            if($date==NULL)
            {
                $date=Date('y-m-d');
            }
            
            include'../model/admin_model.php';
            
            $admin_model =new Admin_model();

            $add_new_case=$admin_model->add_new_case($ref,$parties,$present_status,
                $next_step,
                $select_category,$select_sub_category,$file_location,
                $date,$person_assigned);

            if($add_new_case==TRUE)
            {
               
                //header('Location:../view/add_category_view.php');    
                return TRUE;
            }
            else
            {
                echo"cant insert new case<br/>";
            }
        }
    }
?>

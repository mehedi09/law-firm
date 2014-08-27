<?php
    class Search_controller
    {
        public function search_case($ref,$select_category,$select_sub_category,
                                    $select_date,$select_first_date,$select_last_date,
                                    $person_assigned) //it returns all searched resulted case
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $search_case=$admin_model->search_case($ref,$select_category,$select_sub_category,
                                                    $select_date,$select_first_date,$select_last_date,
                                                    $person_assigned
                                                    );
            
            if($search_case)
            {
                return $search_case;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
   
?>

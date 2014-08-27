
<?php

    class Add_category_controller
    {
        public function __construct() 
        {
            include'../model/admin_model.php';

            $admin_model =new Admin_model();

            $add_category=$admin_model->add_category($_POST['add_category']);

            if($add_category==TRUE)
            {
               
                header('Location:../view/add_category_view.php');    
            }
            else
            {
                echo"category name already exists<br/>";
            }
        }
    }
    
    $add_category_controller=new Add_category_controller();
?>

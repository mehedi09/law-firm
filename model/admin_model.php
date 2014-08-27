<?php
//session_start();

include_once 'db_connection_model.php';
class Admin_model extends Db_connection_model
{
    public function __construct() 
    {
        parent::__construct(); //for Db connection
    }
    
    public function add_category($category_name)
    {
        $this->category_name=$category_name;
        
        if(!$category_name)
        {
            die ("ur <u>category name</u> field cant be empty!!!!!!!!!!<br/>");
        }
        
        
        $sql_insert_category_name="insert into  category(category_name)
            values('$category_name')";
       
        $result_of_insert_category_name=mysql_query($sql_insert_category_name) or die("category_name already exists  Admin_model class  add_category($category_name) <br/>".  mysql_error());
        
        if($result_of_insert_category_name)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function get_all_category_name()
    {
        $sql_get_all_category_name="SELECT * FROM category";
       
        $result_of_get_all_category_name=mysql_query($sql_get_all_category_name) or die("cant select from  Admin_model class  get_all_category_name() <br/>".  mysql_error());
        
        if($result_of_get_all_category_name)
        {
            return $result_of_get_all_category_name;
        }
        else
        {
            return false;
        }
    }
    
    public function add_sub_category($category_name,$sub_category_name)
    {
        $this->category_name=$category_name;
        $this->sub_category_name=$sub_category_name;
        
        if(!$category_name || !$sub_category_name)
        {
            die ("ur <u>category name</u>or <u>sub category name</u> field cant be empty!!!!!!!!!!<br/>");
        }
        
        
        $sql_insert_sub_category_name="insert into  sub_category(category_name,sub_category_name)
            values('$category_name','$sub_category_name')";
       
        $result_of_insert_sub_category_name=mysql_query($sql_insert_sub_category_name) or die("sub category name already exists <br/>".  mysql_error());
        
        if($result_of_insert_sub_category_name)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function view_all_category()
    {
        $sql_view_all_category="SELECT * FROM sub_category";
       
        $result_of_view_all_category=mysql_query($sql_view_all_category) or die("cant select from  Admin_model class  view_all_category() <br/>".  mysql_error());
        
        if($result_of_view_all_category)
        {
            return $result_of_view_all_category;
        }
        else
        {
            return false;
        }
    }
    
    public function add_new_case($ref,$parties,$present_status,
                $next_step,
                $select_category,$select_sub_category,$file_location,
                $case_submitted_date,$person_assigned)
    {
        $this->ref=$ref;
        $this->parties=$parties;
        $this->present_status=$present_status;
        
        $this->next_step=$next_step;
        $this->select_category=$select_category;
        $this->select_sub_category=$select_sub_category;
        
        $this->file_location=$file_location;
        $this->case_submitted_date=$case_submitted_date;
        $this->$person_assigned=$person_assigned;
        
        
        if(!$ref || !$parties || !$present_status ||
                !$next_step ||
                !$select_category || !$select_sub_category || !$file_location ||
                !$case_submitted_date || !$person_assigned
          )
        {
            die ("ur <u>category name</u> field cant be empty!!!!!!!!!!<br/>");
        }
        
        
        $sql_add_new_case="insert into  add_case(ref,parties,present_status,
                                            next_step,
                                            category_name,sub_category_name,file_location,
                                            case_submitted_date,person_assigned
                                             )
            values('$ref','$parties','$present_status',
                    '$next_step',
                    '$select_category','$select_sub_category','$file_location',
                    '$case_submitted_date','$person_assigned'
                   )
                         ";
       
        $result_of_add_new_case=mysql_query($sql_add_new_case) or die("ref  already exists  Admin_model class  add_new_case() <br/>".  mysql_error());
        
        if($result_of_add_new_case)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function create_new_user($user_id,$pass,$user_name,$user_email)
    {
        $this->user_id=$user_id;
        $this->pass=$pass;
        $this->user_name=$user_name;
        $this->user_email=$user_email;
        
        $create_by=$_SESSION['id'];
        
        if(!$user_id || !$pass || !$user_name || !$user_email)
        {
            die ("ur <u>password</u>  <u>user name</u>  <u>user email</u> field cant be empty!!!!!!!!!!<br/>");
        }
        
        
        $sql_create_new_user="insert into  lawyer_info(lawyer_id,pass,email,
                                                       lawyer_name,create_by,type)
                               values('$user_id','$pass','$user_email',
                                      '$user_name','$create_by','employee'
                                     )
                             ";
       
        $result_of_create_new_user=mysql_query($sql_create_new_user) or die("user id  already exists  Admin_model class  create_new_user <br/>".  mysql_error());
        
        if($result_of_create_new_user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function view_all_user()
    {
        $sql_view_all_user="SELECT * FROM lawyer_info";
       
        $result_of_view_all_user=mysql_query($sql_view_all_user) or die("cant select from  Admin_model class  view_all_user() <br/>".  mysql_error());
        
        if($result_of_view_all_user)
        {
            return $result_of_view_all_user;
        }
        else
        {
            return false;
        }
    }
    
     public function view_all_case()
    {
        $sql_view_all_case="SELECT * FROM add_case";
       
        $result_of_view_all_case=mysql_query($sql_view_all_case) or die("cant select from  Admin_model class  vview_all_case() <br/>".  mysql_error());
        
        if($result_of_view_all_case)
        {
            return $result_of_view_all_case;
        }
        else
        {
            return false;
        }
    }
    
    
     public function  search_case($ref,$select_category,$select_sub_category,
                                  $select_date,$select_first_date,$select_last_date,
                                  $person_assigned
                                 )
    {
        $sql_search_case="              SELECT * 
                                        FROM add_case 
                                        where item_id like '%$item_id%'
                                        and item_name like '%$item_name%'
                                        and item_name like '%$item_catagory%'
                         ";
                
        $resultl_stock_item_show_search_item=mysql_query($sql_stock_item_show_search_item) or die("can,t search item from  search_item() <br/>".  mysql_error());
        
        
        //$row_stock_item_show_search_item=mysql_fetch_array($resultl_stock_item_show_search_item);
        
        
        return $resultl_stock_item_show_search_item;
    }
}
?>

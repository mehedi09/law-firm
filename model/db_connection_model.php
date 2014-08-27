<?php
//session_start();

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DATABASE_NAME','lawyer');

class Db_connection_model
{
    //public  $con;
    
    public function __construct()
    {
        $con=  mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die("opps connection error".  mysql_error());
        
        mysql_select_db(DATABASE_NAME,$con) or die("opps connection error".  mysql_error());
        
        $_SESSION['con']=$con;
        
    }
    
    public function loginCheck($id,$pass)
    {
        $this->id=$id;
        $this->pass=$pass;
        
        
        
        
        // {start of admin
        $sql_lawyer_info="select  count(*) from lawyer_info 
            where lawyer_id='$id' and pass='$pass' and type='admin' ";
        
        
        $result_lawyer_info=mysql_query($sql_lawyer_info);
        
        while($row_lawyer_info = mysql_fetch_array($result_lawyer_info))
        {
            if($row_lawyer_info['count(*)']==1)
            {
            
            return "admin";
            }

            else
            {
            echo FALSE;
            }

        }
        // }endof company_admin
 
    }


   
    
   
    
   
}
?>

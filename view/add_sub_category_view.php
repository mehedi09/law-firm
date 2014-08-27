<?php
session_start();
if($_SESSION['loggedIn']==1)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>News Magazine | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<?php
    $error_msg="";
    $success="";
    
if($_POST==TRUE)
{
    
    
    if($_POST['select_category']!='Select Category' && $_POST['add_sub_category'] !="")
    {
        //echo"selcect=$_POST[select_category]<br/>sub cat=$_POST[add_sub_category]<br/>";
        include_once '../controller/add_sub_category_controller.php';
        $add_sub_category_controller=new Add_sub_category_controller();
        $add_sub_category = $add_sub_category_controller->add_sub_category($_POST['select_category'],$_POST['add_sub_category']);
        
        if($add_sub_category==TRUE)
        {
            $success="successfully added<br/>";
            //header('Location:add_sub_category_view.php');
        }
        else
        {
            echo"ur sub category name already exists<br/>";
        }
    }
    else
    {
        $error_msg="ur category name or sub category name empty";
    }
}
?>

<?php
include_once 'include/top_view.php';
?>

<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
        <?php
        include ('include/link.php');
             topmenuLink();
        ?>
    </div>
    
    <br class="clear" />
  </div>
</div>
<b><?php echo"$error_msg"; ?></b>
<b><?php echo"<u>$success</u>"; ?></b>
<!-- ####################################################################################################### -->      
<form class="login_form" action="" method="post">
<fieldset width="1">
<legend>Login Form:</legend><br/>
<table>
    
    <tr>
        <td height="35"></td>
    <td>
    <?php
        include_once '../controller/get_all_category_name_controller.php';
        
        $get_all_category_name_controller=new Get_all_category_name_controller();
        
        $all_category_name = $get_all_category_name_controller->get_all_category_name();
     ?>
           
        
     <?php   
        echo"
    <select name='select_category'>
    <option>Select Category</option>
    ";

while($row_all_category_name = mysql_fetch_array($all_category_name))
{
    echo "
         <option value='$row_all_category_name[category_name]'>$row_all_category_name[category_name]</option>
         ";
}


echo"</select>";

echo"<br/><br/><br/>";
?>
        </td>
    </tr>
  
  <tr>
    <td>Sub Category Name : </td>
    <td><input type="text" name="add_sub_category" /></td>
  </tr>
   
    <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="add" value="Add" /></td>
  </tr>
  
</table>


</fieldset>

</form>
<!-- ####################################################################################################### -->      

<?php
        //this for bottom view
        //bottom_view();
        include_once 'include/bottom_view.php';
} // finish of start if

else
{
    header('Location:login_form_view.php');
}
?>

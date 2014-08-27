
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
    
    
    if($_POST['user_id'] && $_POST['pass'] && $_POST['user_name']!='' && $_POST['user_email'])
    {
        //echo"selcect=$_POST[select_category]<br/>sub cat=$_POST[add_sub_category]<br/>";
        include_once '../controller/create_new_user_controller.php';
        $create_new_user_controller=new Create_new_user_controller();
        $create_new_user = $create_new_user_controller->create_new_user($_POST['user_id'],$_POST['pass'],$_POST['user_name'],$_POST['user_email']);
        
        if($create_new_user==TRUE)
        {
            $success="successfully added<br/>";
            //header('Location:add_sub_category_view.php');
        }
        else
        {
            echo"ur user id already exists<br/>";
        }
        
      //echo "$_POST[select_category]<br/>$_POST[select_sub_category]";
    }
    else
    {
        $error_msg="ur pass or user name  or email empty";
    }
}
?>
    
<?php
 $a="a";
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

<!--##################################################################################################### -->      


<!-- ####################################################################################################### -->  
<?php 
echo"$success<br/>" ;
if($success=="")
{
?>

  <form class="sign_up_form" action="" method="post">
<fieldset width="1">

<table class="sign_up_table">
  
  <tr class="tableBasic">
    <td height="35">User Id : </td>
    <td ><input type="text" name="user_id" /></td>
  </tr>
    
  <tr class="tableBasic">
    <td ><p>Password:</p></td>
    <td ><input type="password" name="pass" /></td>
  </tr>
    
    
    <tr class="tableBasic">
    <td ><p>User Name:</p></td>
    <td ><input type="text" name="user_name" /></td>
  </tr>
    
    <tr class="tableBasic">
    <td ><p>User Email:</p></td>
    <td ><input type="email" name="user_email" /></td>
  </tr>
    
    
  <tr class="tableBasic" >
    <td>&nbsp;</td>
    <td ><input type="submit" name="add_new_user" value="Create New User" /></td>
  </tr>
  
</table>


</fieldset>

</form>
<?php
}
else
{
    
    
    
}
?>
      
<!-- ####################################################################################################### -->      
    


<?php
        //this for bottom view
        include_once 'include/bottom_view.php';
} // finish of start if

else
{
    header('Location:login_form_view.php');
}
?>

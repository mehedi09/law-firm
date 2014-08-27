<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if($_SESSION['loggedIn']==1)
{
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>News Magazine | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />

</head>
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

<!-- ####################################################################################################### -->      
<form class="login_form" action="../controller/add_category_controller.php" method="post">
<fieldset width="1">
<legend>Login Form:</legend><br/>
<table>
  
  <tr>
    <td height="35">Category Name : </td>
    <td><input type="text" name="add_category" /></td>
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
        include_once 'include/bottom_view.php';
} // finish of start if

else
{
    header('Location:login_form_view.php');
}
?>

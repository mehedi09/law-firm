
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
<br/><br/><br/><br/><br/><br/><br/>
<?php
include_once '../controller/view_all_user_controller.php';

$view_all_user_controller=new View_all_user_controller();

$view_all_user=$view_all_user_controller->view_all_user();

if($view_all_user)
{
    $i=0;
    
        while($row_view_all_user= mysql_fetch_array($view_all_user))
        {
?>

<table class="view_table" align="center">
    
    <?php 
    if($i==0)
    {
    ?>
    
     <caption>Show All User</caption>    
    <tr class="even">
    <th> <b><u>user Id<u></b></th>
    <th> <b><u>pass<u></b></th>
    <th><b><u> email<u></b></th>
    <th> <b><u>user name<u></b></th>
    </tr>
    
    <?php
    }
    $i++;
    ?>
  
  <tr class='even'>
    <td height="35"><?php echo"$row_view_all_user[lawyer_id]"; ?></td>
    <td height="35"><?php echo"$row_view_all_user[pass]"; ?></td>
    <td height="35"><?php echo"$row_view_all_user[email]"; ?></td>
    <td height="35"><?php echo"$row_view_all_user[lawyer_name]"; ?></td>
    
  </tr>
  
</table>

<?php
        }
}
else
{
    echo"cant view catagory name<br/>";
}




        //this for bottom view
        include_once 'include/bottom_view.php';
} // finish of start if

else
{
    header('Location:login_form_view.php');
}
?>

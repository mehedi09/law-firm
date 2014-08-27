
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
include_once '../controller/../controller/view_all_case_controller.php';

$view_all_case_controller=new View_all_case_controller;

$view_all_case=$view_all_case_controller->view_all_case();

if($view_all_case)
{
    $i=0;
    
        while($row_view_all_case= mysql_fetch_array($view_all_case))
        {
?>

<table class="view_case" align="center">
    
    <?php 
    if($i==0)
    {
    ?>
    
     <caption>Show All Case</caption>    
    <tr class="even">
    <th> <b><u>ref</u></b></th>
    <th> <b><u>parties</u></b></th>
    <th><b><u> present_status</u></b></th>
    <th> <b><u>next_step</u></b></th>
                    
    <th> <b><u>category_name</u></b></th>
    <th> <b><u>sub_category_name</u></b></th>
    <th><b><u> file_location</u></b></th>
    <th> <b><u>case_submitted_date</u></b></th>
                    
    <th><b><u> person assigned</u></b></th>
    <th> <b><u>comment</u></b></th>
                    
    </tr>
    
    <?php
    }
    $i++;
    ?>
  
  <tr class='even'>
    <td height="70"><?php echo"$row_view_all_case[ref]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[parties]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[present_status]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[next_step]"; ?></td>
    
    <td height="70"><?php echo"$row_view_all_case[category_name]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[sub_category_name]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[file_location]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[case_submitted_date]"; ?></td>
    
    <td height="70"><?php echo"$row_view_all_case[person_assigned]"; ?></td>
    <td height="70"><?php echo"$row_view_all_case[assigned_person_comment]"; ?></td>
    
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

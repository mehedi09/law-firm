
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

<?php
include_once '../controller/view_category_controller.php';

$view_category_controller=new View_category_controller();

$view_category=$view_category_controller->view_all_category();

if($view_category)
{
    ?>
<table class="add_item_table" align="center">
    
    <?php
        while($row_view_category= mysql_fetch_array($view_category))
        {
            //$a=$row_view_category[category_name];
            //$a=$row_all_category_name['category_name'];
            if($a!=$row_view_category["category_name"])
            {
                $a=$row_view_category["category_name"];
                //echo"<b align=right><u>$row_view_category[category_name]</u></b><br/>";
                ?>

    <tr class="even">
        <th> <b><u><font color="blue"><?php echo "$row_view_category[category_name]"; ?> </u></b></th>
    </tr>
    
 
            <?php
            } //end of while's if
            //echo"<ol>$row_view_category[sub_category_name]</ol>";
            ?>
            
            
  <tr class='even'>
    <td height="35"><?php echo"$row_view_category[sub_category_name]"; ?></td>
  </tr>
  

            
<?php
        } //end while
?>
    </table>
<?php
}//end of If
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


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
    
    
    if($_POST==TRUE)
    {
        //echo"selcect=$_POST[select_category]<br/>sub cat=$_POST[select_sub_category]<br/>";
        include_once '../controller/search_controller.php';
        $search_controller=new Search_controller;
        $search_case = $search_controller->search_case($_POST['ref'],$_POST['select_category'],$_POST['select_sub_category'],
                                                             $_POST['select_date'],$_POST['select_first_date'],$_POST['select_last_date'],
                                                             $_POST['person_assigned']
                                                             );
        
        if($search_case==TRUE)
        {
            $success="searched successfully <br/>";
            //header('Location:add_sub_category_view.php');
        }
        else
        {
            echo"ur sub category name already exists<br/>";
        }
        
      //echo "$_POST[select_category]<br/>$_POST[select_sub_category]"; */
    }
    else
    {
        $error_msg="ur category name or sub category name empty";
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
  <form class="login_form" action="" method="post">
<fieldset width="1">
<legend>Add Case :</legend><br/>
<table>
  
  <tr>
    <td height="35">Ref No : </td>
    <td><input type="text" name="ref" /></td>
  </tr>

   
  <tr>
      <td></td>
      <td>
    <?php
        include_once '../controller/../controller/view_category_controller.php';
        
        $view_category_controller=new View_category_controller();
        
        $all_category_and_sub_category = $view_category_controller->view_all_category(); //contains all category & sub_category name
     ?>
           
        
     <?php   
        echo"
    <select name='select_category'>
    <option value=''>Select Category</option>
    ";
        
$i=0;
while($row_all_category_and_sub_category = mysql_fetch_array($all_category_and_sub_category))
{
    $sub_category[$i]=$row_all_category_and_sub_category["sub_category_name"];
    
    if($a!=$row_all_category_and_sub_category["category_name"])
    {
        $a=$row_all_category_and_sub_category["category_name"];
        echo "
             <option value='$row_all_category_and_sub_category[category_name]'>$row_all_category_and_sub_category[category_name]</option>
             ";
    }
    $i++;
}


echo"</select>";

echo"<br/><br/><br/>";
?>
          </td>
      </tr>
 
    <tr>
      <td></td>
      <td>
     <?php
     
    
     $a="a";
        echo"
    <select name='select_sub_category'>
    <option value=''>Select Sub Category</option>
    ";

foreach ($sub_category as $value)
{
        echo "
             <option value='$value'>$value</option>
             ";
}


echo"</select>";

echo"<br/><br/><br/>";
?>
          </td>
      </tr>
    
  <tr>
    <td><p> Date (yyyy-mm-dd) :</p></td>
    <td><input type="date" name="select_date" /></td>
  </tr>
    
    
    <tr>
    
    <td><p>Date (yyyy-mm-dd) :</p></td>
    <td><input type="date" name="select_first_date" /></td>
 
   <td><p> to </p></td>
    <td></td>
    <td><p> Date (yyyy-mm-dd) :</p></td>
    <td><input type="date" name="select_lase_date" /></td>
  </tr>
    
    
    <tr>
    <td height="35">Person Assigned: </td>
    <td><input type="text" name="person_assigned" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="search" value="search" /></td>
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

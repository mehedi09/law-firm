<?php

function topmenuLink()
{
    
session_start();
$status=$_SESSION['loggedIn'];
   if($status==1)
   {
       ?>
<ul>
        <li><a href="admin_view.php">Home</a></li>
        
        <li><a href="#">Account</a>
          <ul>
            <li><a href="create_new_user_view.php">Create New Account</a></li>
            <li><a href="view_all_user_view.php">View All User</a></li>
          </ul>
        </li>
        
        <li><a href="#">CATEGORY</a>
          <ul>
            <li><a href="add_category_view.php">Add Category</a></li>
            <li><a href="../view/add_sub_category_view.php">Add Sub Category</a></li>
            <li><a href="view_category_view.php">View Category</a></li>
          </ul>
        </li>
        
        <li><a href="#">Information</a>
          <ul>
            <li><a href="add_new_case_view.php">Add New Case</a></li>
            <li><a href="view_all_case_view.php">View All Case</a></li>
          </ul>
        </li>
        
        <li><a href="search_view.php">SEARCH</a>
          
        </li>
        
        <li><a href="../controller/logout_controller.php">Logout</a></li>
      </ul>
<?php
   }
}
?>


<?php

function bottom_view()
{
$status=$_SESSION['loggedIn'];
   if($status==1)
   {
       ?>
<br/><br/><br/>   <br/>      <br/>   <br/><br/><br/><br/>         
<br/><br/><br/>   <br/>
<!-- ####################################################################################################### -->
<div class="wrapper col8">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2011 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>
</body>
    
</html>

<?php
   }
}
?>

<?php

function body_caseView($arr, $position,$select_cat,$select_sub)
{
    if($position==0)
    {
        $selected_cat="";
        $selected_sub="";
        $selected_catVal="-->Choose a Type<--";
        $selected_subVal="-->Choose a Type<--";
    }
    else
    {
        $selected_catVal = $selected_cat=$select_cat;
        $selected_sub_cat =  $selected_sub=$select_sub;
    }
    ?>
    

      <form class="login_form" action="../controller/add_case_controller.php" method="post">
<fieldset width="1">

<table>
  
  <tr>
    <td height="35">Category : </td>
    <select name="chose_category">
        <option selected='<?php $selct_cat?>'><?php echo"$selected_catVal"?></option>
        <?php
        for($i=0; $i< sizeof($arr['category']); $i++)
        {
           ?>
        <option value='<?php $arr['category'][$i]?>'><?php echo$arr['category'][$i]?> </option>
            <?php
        }
        ?>
    </select>
    <td><input type="text" name="txt_cat" /></td>
  </tr>
    
  <tr>
    <td height="35">Category : </td>
    
    <select name="chose_subCategory">
        <option selected='<?php $select_sub?>'><?php echo"$selected_subVal"?></option>
        <?php
        for($i=0; $i< sizeof($arr['sub_category']); $i++)
        {
           ?>
        <option value='<?php $arr['sub_category'][$i]?>'><?php echo$arr['sub_category'][$i]?> </option>
            <?php
        }
        ?>
    </select>
    
    <td><input type="text" name="txt_subCat" /></td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="add_case" value="Add" /></td>
  </tr>
  
</table>


</fieldset>

</form>    

    <?php
}
/*
$arr['category']=array("mahi","Isteak",4, "himal");
$arr['sub_category']=array("mahi","Isteak",4, "himal");
$position=0;$select_cat=""; $select_sub="";
body_caseView($arr, $position,$select_cat,$select_sub);
*/
?>
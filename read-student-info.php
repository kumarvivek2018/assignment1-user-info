<?php
 include 'header.php';


 if(isset($_GET['id'])){
  $user_info=$user_obj->view_user_by_user_id($_GET['id']);




 }else{
  header('Location: index.php');
 }


 ?>
<div class="container " >
  <div class="row content">
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View User List</a>
 <h3>View User Info</h3>
     <hr/>
    <label >First Name:</label>
   <?php  if(isset($user_info['first_name'])){echo $user_info['first_name']; }?>

   <label >Last Name:</label>
  <?php  if(isset($user_info['last_name'])){echo $user_info['last_name']; }?>

<br/>
    <label>Email address:</label>
  <?php  if(isset($user_info['email_address'])){echo $user_info['email_address'];} ?>

    <br/>

    <a href="<?php echo 'update-user-info.php?id='.$user_info["id"] ?>" class="button button-blue">Edit</a>





  </div>

</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

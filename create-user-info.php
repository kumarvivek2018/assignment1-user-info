<?php
include 'header.php';
if (isset($_POST['create_user'])) {
    $user_obj->create_user_info($_POST);
}
?>
<div class="container">
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">View User List</a>
        <h3>Create User Info</h3>
        <hr/>
        <form method="post" action="">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" required maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="create_user" value="Submit"/>
        </form>
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

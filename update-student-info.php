<?php
include 'header.php';
if (isset($_GET['id'])) {
    $user_info = $user_obj->view_user_by_user_id($_GET['id']);
    if (isset($_POST['update_user']) && $_GET['id'] === $_POST['id']) {
        $user_obj->update_user_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " >
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">View User List</a>
        <h3>Update User Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($user_info['id'])) {
            echo $user_info['id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php if (isset($user_info['first_name'])) {
                   echo $user_info['first_name'];
        } ?>" id="first_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php if (isset($user_info['last_name'])) {
                   echo $user_info['last_name'];
        } ?>" id="last_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" value="<?php if (isset($user_info['email_address'])) {
            echo $user_info['email_address'];
        } ?>" name="email_address" id="email_address" required maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_user" value="Update"/>
        </form>
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

<?php
include 'header.php';
$user_list = $user_obj->user_list();
?>
<div class="container " >
    <div class="row content">
        <a  href="create-user-info.php"  class="button button-purple mt-12 pull-right">Create User</a>
        <h3>User List</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($user_list->num_rows > 0) {
  while ($row = $user_list->fetch_assoc()) {
     ?>
             <tr>
                <td><?php echo $row["first_name"] ?></td>
                <td><?php echo $row["last_name"] ?></td>
                <td><?php echo $row["email_address"] ?></td>
                <td class="text-right">
                    <a  href="<?php echo 'delete-user-info.php?id=' . $row["id"] ?>" class="button button-red">Delete</a>
                    <a  href="<?php echo 'update-user-info.php?id=' . $row["id"] ?>" class="button button-blue">Edit</a>
                    <a href="<?php echo 'read-user-info.php?id=' . $row["id"] ?>" class="button button-green">View</a>
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
        </table>

    </div>
</div>
<?php
include 'footer.php';
?>

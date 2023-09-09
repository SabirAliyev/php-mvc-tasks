<?php
session_start();
require 'views/layouts/top.php';
?>
<header>
</header>
<section>
    <h3>Add new Task</h3>
    <form action="/tasks" method="post" style="display: flex; flex-direction: column;">
        <label style="margin-bottom: 10px;">
            Title:
            <textarea name="title" cols="50" rows="1" style="margin-left: 56px"><?php echo $_SESSION['title'] ?? ''; ?></textarea>
        </label>
        <label style="margin-bottom: 10px;">
            Description:
            <textarea name="description" cols="50" rows="10"><?php echo $_SESSION['description'] ?? ''; ?></textarea>
        </label>
        <input type="submit" width="100" value="Save" style="width: 200px; margin-left: 200px" >
    </form>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div style='margin-top: 20px; color: red'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

</section>
<?php require 'views/layouts/bottom.php' ?>

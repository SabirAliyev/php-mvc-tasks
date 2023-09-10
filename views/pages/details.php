<?php
session_start();
require 'views/layouts/top.php' ?>

<header>

</header>

<section>
    <h3>View task details</h3>
    <form action="/tasks/details" method="post" style="display: flex; flex-direction: column;">
        <input type="hidden" name="_method" value="UPDATE">
        <input type="hidden" name="id" value="<?= $task->getId(); ?>">
        <label style="margin-bottom: 10px;">
            Title:
            <textarea name="title" cols="50" rows="1" style="margin-left: 56px"><?= $task->getTitle(); ?></textarea>
        </label>
        <label style="margin-bottom: 10px;">
            Description:
            <textarea name="description" cols="50" rows="10"><?= $task->getDescription(); ?></textarea>
        </label>
        <div style="display: flex; justify-content: flex-start; margin-left: 140px;">
            <input type="submit" name="action" value="save" style="width: 200px; margin-right: 10px;">
<!--            <input type="submit" name="action" value="delete" style="width: 100px;">-->
        </div>
    </form>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div style='margin-top: 20px; color: deepskyblue'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<div style='margin-top: 20px; color: red'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    }
    ?>
</section>

<?php require 'views/layouts/bottom.php' ?>

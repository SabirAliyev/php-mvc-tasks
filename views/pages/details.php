<?php require 'views/layouts/top.php' ?>
<header>

</header>

<section>
    <h3>View task details</h3>
    <form action="/tasks" method="post" style="display: flex; flex-direction: column;">
        <input type="hidden" name="_method" value="DELETE">
        <label style="margin-bottom: 10px;">
            Title:
            <textarea name="title" cols="50" rows="1" style="margin-left: 56px"><?= $task->getTitle(); ?></textarea>
        </label>
        <label style="margin-bottom: 10px;">
            Description:
            <textarea name="description" cols="50" rows="10"><?= $task->getDescription(); ?></textarea>
        </label>
        <input type="submit" width="100" value="Submit" style="width: 200px; margin-left: 200px" >
    </form>
</section>

<?php require 'views/layouts/bottom.php' ?>
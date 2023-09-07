<?php require 'views/layouts/top.php' ?>
<header>
    <h1>Tasks</h1>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li><strong>Title</strong> - <?= $task->title(); ?></li>
            <li><strong>Description</strong> - <?= $task->description(); ?></li>
            <li><strong>Completed</strong> - <?= $task->isComplete() ? "&check;" : "&cross;" ?></li>
            <hr>
        <?php endforeach; ?>     
    </ul>
</header>

    <section>
        <h3>Add new Task</h3>
        <form action="/tasks" method="post" style="display: flex; flex-direction: column;">
            <label style="margin-bottom: 10px;">
                Title:
                <textarea name="title" cols="50" rows="1" style="margin-left: 56px"></textarea>
            </label>
            <label style="margin-bottom: 10px;">
                Description:
                <textarea name="description" cols="50" rows="10"></textarea>
            </label>
            <input type="submit" width="100" value="Submit" style="width: 200px; margin-left: 200px" >
        </form>
    </section>

<?php require 'views/layouts/bottom.php' ?>
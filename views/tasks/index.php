<?php require 'views/layouts/top.php' ?>
    <header>
        <h1>Tasks</h1>
        <ul>
            <?php foreach ($tasks as $task) : ?>
                <a href="tasks/details?id=<?= $task->getId(); ?>" style="text-decoration: none; color: inherit;">
                    <li>
                        <strong>Title</strong> - <?= $task->getTitle(); ?><br>
                        <strong>Description</strong> - <?= $task->getDescription(); ?><br>
                        <strong>Completed</strong> - <?= $task->isComplete() ? "&check;" : "&cross;" ?>
                    </li>
                </a>
                <hr>
            <?php endforeach; ?>
        </ul>
    </header>

<?php require 'views/layouts/bottom.php' ?>
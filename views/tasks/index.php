<?php require 'views/layouts/top.php' ?>

<head>
    <style>
        .scrollable-div {
            height: 400px;
            width: 800px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <title></title>
</head>

<header>
    <h1>Tasks</h1>
    <div class="scrollable-div">
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
    </div>
</header>
<?php require 'views/layouts/bottom.php' ?>

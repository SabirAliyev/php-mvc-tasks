<?php

namespace App\Controllers;
use App\App\App;
use App\Models\Task;
use Exception;

session_start();

class TaskController
{
    public static function index()
    {
        try {
            $tasks = App::get('db')->selectAll('tasks', Task::class);
        } catch (Exception $e){
            error_log("Exception: " . $e->getMessage(), 3, ERROR_LOG_PATH);
        }

        $title = 'Tasks';

        return view('tasks.index', compact('tasks', 'title'));
    }

    public function show()
    {
        $id = $_GET['id'];

        $task = $this->getTaskById($id);

        if ($task->getId() != 0) {
            return view('pages.details', ['task' => $task]);
        } else {
            return redirect('error_404');
        }
    }

    private function getTaskById($id): Task
    {
        $task = new Task();

        try {
            $task = App::get('db')->selectOne('tasks', $id, Task::class);
        } catch (Exception $e){
            error_log("Exception: " . $e->getMessage(), 3, ERROR_LOG_PATH);
        }

        return $task;
    }

    public static function store()
    {
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['description'] = $_POST['description'];

        if (empty($_POST['title']) || empty($_POST['description'])) {
            $_SESSION['error'] = "Title and description cannot be empty.";
            return redirect('add');
        }

        $task = new Task();
        $task->setTitle($_POST['title']);

        try {
            App::get('db')->insert('tasks', ['title' => $_POST['title'], 'description' => $_POST['description']]);
            $_SESSION['message'] = "New Task '" . $task->getTitle() . "' added";

            unset($_SESSION['title']);
            unset($_SESSION['description']);
        }
        catch (Exception $e) {
            error_log($e->getMessage());
            require "views/pages/500.php";
        }

        return redirect('add');
    }

    public static function update()
    {
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['description'] = $_POST['description'];

        if (empty($_POST['title']) || empty($_POST['description'])) {
            $_SESSION['error'] = "Title and Description boxes cannot be empty.";
        }

        $task = new Task();
        $id = $_POST['id'];
        $task->setTitle($_POST['title']);

        try {
            App::get('db')->update('tasks', $id, ['title' => $_POST['title'], 'description' => $_POST['description']]);

            if (!$_SESSION['error']){
                $_SESSION['message'] = "New Task '" . $task->getTitle() . "' updated";
            }

            unset($_SESSION['title']);
            unset($_SESSION['description']);
        }
        catch (Exception $e) {
            error_log("Exception: " . $e->getMessage(), 3, "log/error.log");
            return redirect('500');
        }

        // Stay on the page.
        return redirect('tasks/details'.'?id='."$id");
    }

    public static function delete()
    {
        $id = $_POST['id'];

        try {
            echo "Removal... ";
            App::get('db')->delete('tasks', $id);
        }
        catch (Exception $e) {
            error_log("Exception: " . $e->getMessage(), 3, "log/error.log");
            return redirect('500');
        }

        // Redirect to the tasks list page.
        return redirect('tasks');
    }
}
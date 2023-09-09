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

    public static function store()
    {
        // Store the form data in session variables
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['description'] = $_POST['description'];

        if (empty($_POST['title']) || empty($_POST['description'])) {
            $_SESSION['message'] = "Title and description cannot be empty.";
            return redirect('add');
        }

        $task = new Task();
        $task->setTitle($_POST['title']);

        try {
            App::get('db')->insert('tasks', ['title' => $_POST['title'], 'description' => $_POST['description']]);
            $_SESSION['message'] = "New Task " . $task->getTitle() . " added";

            // Clear the form data from session variables
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
        $id = $_POST['id'];

        try {
            App::get('db')->update('tasks', $id, ['title' => $_POST['title'], 'description' => $_POST['description']]);
        }
        catch (Exception $e) {
            error_log("Exception: " . $e->getMessage(), 3, "log/error.log");
            return redirect('500');
        }

        // Redirect to the tasks list page.
        return redirect('tasks');
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
}
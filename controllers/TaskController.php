<?php

namespace App\Controllers;
use App\App\App;
use App\Models\Task;
use Exception;

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
        try {
            App::get('db')->insert('tasks', ['title' => $_POST['title'], 'description' => $_POST['description']]);
            $_SESSION['task_added'] = 'Task successfully added!';
        }
        catch (Exception $e) {
            $_SESSION['task_error'] = 'An error occurred while adding the task.';
            require "views/pages/500.php";
        }

        // Redirect to the same (add) page.
        return redirect('add');
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
            $task = App::get('db')->selectOne($id, 'tasks', Task::class);
        } catch (Exception $e){
            error_log("Exception: " . $e->getMessage(), 3, ERROR_LOG_PATH);
        }

        return $task;
    }
}
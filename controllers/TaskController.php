<?php

namespace App\Controllers;
use App\App\App;
use App\Models\Task;
use Exception;

require_once 'config.php';

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
        // Save the task.
        try {
            App::get('db')->insert('tasks', ['title' => $_POST['title'], 'description' => $_POST['description']]);
            $_SESSION['task_added'] = 'Task successfully added!';
        }
        catch (Exception $e) {
            $_SESSION['task_error'] = 'An error occurred while adding the task.';
            require "views/pages/500.php";
            dd($e->getMessage());
        }

        // Redirect to tasks.
        return redirect('add');
    }
}
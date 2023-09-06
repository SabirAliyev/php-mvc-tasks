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
            error_log("Exception: " . $e->getMessage(), 3, "logs/app.log");
        }

        $title = 'Tasks';

        return view('tasks.index',
            compact('tasks', 'title'));
    }

    public static function store()
    {  
        // Save the task.
        try {
            App::get('db')->insert('tasks', ['description' => $_POST['description']]);
        }
        catch (Exception $e) {
            require "views/pages/500.php";
        }

        // Redirect to tasks.
        return redirect('tasks');
    }
}
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
        // Log POST data
        error_log("POST data: " . print_r($_POST, true), 3, ERROR_LOG_PATH);

        // Save the task.
        try {
            $insertId = App::get('db')->insert('tasks', ['title' => $_POST['title'], 'description' => $_POST['description']]);
            error_log("Inserted ID: " . $insertId, 3, "logs/app.log");
        }
        catch (Exception $e) {
            error_log("Exception in store(): " . $e->getMessage(), 3, ERROR_LOG_PATH);
            require "views/pages/500.php";
            dd($e->getMessage());
        }

        // Log redirect
        error_log("About to redirect to tasks", 3, "logs/app.log");

        // Redirect to tasks.
        return redirect('tasks');
    }
}
<?php

namespace App\Models;

// A class that represents a ToDo task.
class Task
{
    protected string $title;
    protected string $description;
    protected bool $completed;

    public function setTitle($newTitle): void
    {
        $this->title = $newTitle;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function setDescription($newDescription): void
    {
        $this->description = $newDescription;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function complete(): void
    {
        $this->completed = true;
    }

    public function isComplete(): bool
    {
        return $this->completed;
    }
}
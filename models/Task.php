<?php

namespace App\Models;

// A class that represents a ToDo task.
class Task
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected bool $completed;

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle($newTitle): void
    {
        $this->title = $newTitle;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription($newDescription): void
    {
        $this->description = $newDescription;
    }

    public function getDescription(): string
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
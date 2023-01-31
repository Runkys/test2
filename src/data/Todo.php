<?php

namespace App\data;


class Todo 
{
    public int $id;
    public string $task;

    public string $description;

    public bool $completed;

    private static int $count = 1;

    public function __construct($task, $description)
    {
        $this->completed = false;
        $this->task = $task;
        $this->id = self::$count;
        $this->description = $description;
        self::$count++;

    }
}

// attribut static , qui s'incrimente de 1 et que ça valeur change a chaque fois commence a 1 puis 2 puis 3 etc etc etc
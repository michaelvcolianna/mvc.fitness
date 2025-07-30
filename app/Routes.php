<?php

namespace App;

use Illuminate\Support\Stringable;

enum Routes
{
    case dashboard;
    case exercises;
    case groupings;
    case stats;
    case workouts;

    public function inNav(): bool
    {
        return match($this) {
            Routes::dashboard, Routes::exercises, Routes::groupings, Routes::workouts => true,
            Routes::stats => false
        };
    }

    public function name(): string
    {
        return str($this->name)->apa();
    }

    public function path(): string
    {
        return implode('/', ['', $this->key()->replace('-', '/')]);
    }

    public function view(): string
    {
        return $this->key()->replace('-', '.');
    }

    protected function key(): Stringable
    {
        return str($this->name)->kebab();
    }
}

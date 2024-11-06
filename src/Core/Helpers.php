<?php

function dd(...$value)
{
    echo "<pre>";
    var_dump(...$value);
    echo "</pre>";
}

function env(string $value, string $defalut = '')
{
    return $_ENV[$value] ?? $defalut;
}

function view(string $view, array $data = [])
{
    extract($data);
    require BASE_DIR . 'src/views/' . $view . '.view.php';
}

function views_path(string $path = ''): string
{
    return BASE_DIR . 'src/views/' . $path;
}

/* Project Custom Function */
function taskStatus(string $status): string
{
    return match($status) {
        'pending'       => 'Pending',
        'in_progress'   => 'In Progess',
        'completed'     => 'Completed',
    };
}

function taskStatusColor(string $status): string
{
    return match($status) {
        'pending'       => 'warning',
        'in_progress'   => 'primary',
        'completed'     => 'success',
    };
}

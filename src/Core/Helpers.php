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
    
    function assets(string $value): string
    {
        $root_dir = explode('/', $_SERVER['DOCUMENT_ROOT']);
        $root_path = '/';
        
        if (end($root_dir) !== 'public') {
            $root_path = '/public/';
        }
        
        return $root_path . 'assets/' . $value;
    }
    
    function view(string $view, array $data = [])
    {
        extract($data);
        require BASE_DIR . 'src/views/' . $view . '.view.php';
        return;
    }
    
    function views_path(string $path = ''): string
    {
        return BASE_DIR . 'src/views/' . $path;
    }
    
    /* Project Custom Function */
    function taskStatus(string $status): string
    {
        return match ($status) {
            'pending' => 'Pending',
            'in_progress' => 'In Progess',
            'completed' => 'Completed',
        };
    }
    
    function taskStatusColor(string $status): string
    {
        return match ($status) {
            'pending' => 'warning text-dark',
            'in_progress' => 'primary text-white',
            'completed' => 'success text-white',
        };
    }

<?php

namespace TaskManagementSystem\Core;

class Controller
{
    protected function redirect(string $url): never
    {
        header("Location: $url");
        exit;
    }
}
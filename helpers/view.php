<?php

function view(string $viewName, $context=[]): void
{
    extract($context);
    $filePath = str_replace('.', '/', $viewName);
    require "views/{$filePath}.php";
}
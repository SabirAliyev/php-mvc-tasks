<?php

function redirect(string $endpoint): void
{
    header("Location: /{$endpoint}");
}

function errorRedirect(int $code): void
{
    switch ($code){
        case $code == 404:
            header("Location: /404");
            break;
        case $code == 500:
            header("Location: /500");
            break;

    }
}
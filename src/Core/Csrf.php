<?php

namespace Iamdmc\PhpAddressBook\Core;

class Csrf
{
    public static function token(): string
    {
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf'];
    }

    public static function field(): string
    {
        return '<input type="hidden" name="csrf" value="' . self::token() . '">';
    }

    public static function verify(): bool
    {
        return isset($_POST['csrf'], $_SESSION['csrf']) &&
            hash_equals($_SESSION['csrf'], $_POST['csrf']);
    }
}
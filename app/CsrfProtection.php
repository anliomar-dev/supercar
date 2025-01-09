<?php

namespace app;


use Random\RandomException;

class CsrfProtection
{
    /**
     * @throws RandomException
     */
    public function generateToken(): string{
        return bin2hex(random_bytes(32));
    }

    public function validateToken($token): bool{
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
    }
}
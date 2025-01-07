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
        return $_SESSION['scrf_token'] === $token;
    }
}
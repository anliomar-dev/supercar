<?php

    use app\CsrfProtection;
    use PHPUnit\Framework\TestCase;
    use Random\RandomException;

    class CsrfProtectionTest extends TestCase
    {
        /**
         * Initializes the session before each test.
         */
        protected function setUp(): void
        {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                @session_start();
            }
        }

        /**
         * Cleans and destroys the session after each test.
         */
        protected function tearDown(): void
        {
            if (session_status() === PHP_SESSION_ACTIVE) {
                session_unset();
                session_destroy();
            }
        }

        /**
         * Tests the behavior of the validateToken method in different cases.
         * @throws RandomException
         */
        public function testValidateCsrfTokenBehavior()
        {
            $csrfProtection = new CsrfProtection();

            // Case 1: CSRF token not defined in the session
            $csrf_not_defined = $csrfProtection->validateToken(bin2hex(random_bytes(32)));
            $this->assertFalse(
                $csrf_not_defined,
                "Expected validation to fail when CSRF token is not defined."
            );

            // Case 2: Invalid CSRF token
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $csrf_invalid = $csrfProtection->validateToken("invalid_csrf_token");
            $this->assertFalse(
                $csrf_invalid,
                "Expected validation to fail when an invalid CSRF token is provided."
            );

            // Case 3: Valid CSRF token
            $this->assertTrue(
                $csrfProtection->validateToken($_SESSION['csrf_token']),
                "Expected validation to pass for a valid CSRF token."
            );
        }

        /**
         * Tests the behavior of the generateToken() method.
         * @throws RandomException
         */
        public function testGenerateToken()
        {
            $csrfProtection = new CsrfProtection();

            // Verify that the token is a string
            $token = $csrfProtection->generateToken();
            $this->assertIsString(
                $token,
                "Expected the generated token to be a string."
            );

            // Verify the length of the token (64 characters for 32 bytes in hexadecimal)
            $this->assertEquals(
                64,
                strlen($token),
                "Expected the token to be 64 characters long."
            );

            // Verify that two generated tokens are unique
            $token2 = $csrfProtection->generateToken();
            $this->assertNotEquals(
                $token,
                $token2,
                "Expected two generated tokens to be unique."
            );
        }
    }

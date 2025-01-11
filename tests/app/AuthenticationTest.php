<?php

    namespace app;

    use PHPUnit\Framework\TestCase;
    use app\Authentication;

    class AuthenticationTest extends TestCase
    {
        /**
         * Initializes the session before each test.
         */
        protected function setUp(): void
        {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                @session_start();
            }

            if (!defined('ROOT')) {
                define('ROOT', dirname(__DIR__, 2) . '/');
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

        // Test successful authentication with valid credentials
        public function testAuthenticate():void{
            $auth = new Authentication();
            $authenticate = $auth->authenticate("test-user@gmail.com", "User-1234");
            $auth_succed = is_array($authenticate) && (
                $authenticate["id_utilisateur"] == 6 &&
                $authenticate["prenom"] == "test-user" &&
                $authenticate["nom"] == "user-test" &&
                $authenticate["email"] == "test-user@gmail.com"
            );
            $this->assertTrue(
                $auth_succed,
                "authentication should succeed with the rights information"
            );

            // Test authentication failure with incorrect password
            $failed_authenticate_wrong_password = $auth->authenticate("test-user@gmail.com", "WrongPassword");
            $this->assertNull(
                $failed_authenticate_wrong_password,
                "authentication should not succeed with the wrong password"
            );

            // Test authentication failure with incorrect email and password
            $failed_authenticate_wrong_credentials = $auth->authenticate("wrong-user@gmail.com", "WrongPassword");
            $this->assertNull(
                $failed_authenticate_wrong_credentials,
                "authentication should not succeed with the wrong email && password"
            );
        }
    }

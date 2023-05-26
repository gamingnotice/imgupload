<?php

require_once 'Database.php';
require_once __DIR__.'/../vendor/smarty/smarty/libs/Smarty.class.php';

class AdminController {
    private $db;
    private $smarty;

    public function __construct() {
        $this->db = new Database();
        $this->smarty = new Smarty();

        // Start the session
        session_start();

        // Check if the user is logged in
        if (!$this->isLoggedIn()) {
            $this->handleLogin();
        } else {
            $this->handleAdminPage();
        }
    }

    private function isLoggedIn() {
        return isset($_SESSION['admin']);
    }

    private function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate the username and password
            if ($this->validateCredentials($username, $password)) {
                // Login successful
                $_SESSION['admin'] = true;
                $this->redirectToAdminPage();
            } else {
                // Invalid credentials
                $this->smarty->assign('error', 'Invalid username or password.');
                $this->smarty->display('login.tpl');
            }
        } else {
            // Display the login form
            $this->smarty->display('login.tpl');
        }
    }

    private function validateCredentials($username, $password) {
        // Implement your own logic to validate the credentials (e.g., check against a database)
        // Return true if the credentials are valid, false otherwise
    }

    private function redirectToAdminPage() {
        header('Location: /admin');
        exit;
    }

    private function handleAdminPage() {
        $conn = $this->db->connect();

        // Fetch images
        $stmt = $conn->prepare('SELECT * FROM images');
        $stmt->execute();
        $images = $stmt->fetchAll();

        // Fetch logs
        $stmt = $conn->prepare('SELECT * FROM logs');
        $stmt->execute();
        $logs = $stmt->fetchAll();

        $this->smarty->assign('images', $images);
        $this->smarty->assign('logs', $logs);
        $this->smarty->display('admin.tpl');
    }

    public function logout() {
        session_unset();
        session_destroy();
        $this->redirectToLogin();
    }

    private function redirectToLogin() {
        header('Location: /login');
        exit;
    }
}

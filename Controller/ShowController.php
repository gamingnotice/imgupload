<?php
declare(strict_types=1);

class ShowController {
    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filename = basename($_GET['path']); // Sanitize input to prevent directory traversal
            $filepath = 'uploads/' . $filename;

            if (!file_exists($filepath)) {
                http_response_code(404);
                echo "Datei nicht gefunden.";
                exit;
            }

            header('Content-Type: image/jpeg');
            readfile($filepath);
        } else {
            http_response_code(405);
            echo "Nicht zulässige Anforderungsmethode.";
        }
    }
}

<?php

require_once 'Database.php';

class UploadController
{
    public function handleUpload()
    {
        // Überprüfe, ob der API-Schlüssel in der Anfrage vorhanden ist
        if (!isset($_POST['api_key'])) {
            http_response_code(401); // Nicht autorisiert
            echo json_encode(array('error' => 'API-Schlüssel nicht angegeben'));
            exit;
        }

        $apiKey = $_POST['api_key'];

        // Überprüfe den API-Schlüssel in der Datenbank
        $database = new Database();
        $conn = $database->connect();
        $stmt = $conn->prepare('SELECT * FROM users WHERE api_key = :api_key');
        $stmt->bindValue(':api_key', $apiKey);
        $stmt->execute();

        if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
            http_response_code(403); // Zugriff verweigert
            echo json_encode(array('error' => 'Ungültiger API-Schlüssel'));
            exit;
        }

        if (!isset($_FILES['file'])) {
            http_response_code(400);
            echo "Keine Datei gesendet.";
            exit;
        }

        $file = $_FILES['file'];

        if ($file['error'] !== 0) {
            http_response_code(400);
            echo "Dateiupload fehlgeschlagen.";
            exit;
        }

        $path = 'uploads/' . $file['name'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (move_uploaded_file($file['tmp_name'], $path)) {
                // Log-Eintrag speichern
                $logMessage = "Datei hochgeladen: " . $file['name'] . " - Hochgeladen von: " . $apiKey;
                $this->saveLog($conn, $logMessage, $file['name']);

                echo "Datei erfolgreich hochgeladen.";
            } else {
                http_response_code(500);
                echo "Fehler beim Hochladen der Datei.";
            }
        } else {
            http_response_code(405);
            echo "Nicht zulässige Anforderungsmethode.";
        }
    }

    private function saveLog($conn, $logMessage, $fileName)
    {
        $stmt = $conn->prepare('INSERT INTO logs (message, file_name) VALUES (:message, :file_name)');
        $stmt->bindValue(':message', $logMessage);
        $stmt->bindValue(':file_name', $fileName);
        $stmt->execute();
    }
}
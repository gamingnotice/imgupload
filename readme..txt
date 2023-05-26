UploadController
Der UploadController behandelt den Upload von Dateien auf den Server. Der Controller überprüft den API-Schlüssel des Benutzers, um sicherzustellen, dass der Benutzer autorisiert ist. Die hochgeladenen Dateien werden im Ordner "uploads/" gespeichert. Für jede hochgeladene Datei wird ein Log-Eintrag erstellt, der den Dateinamen und den Benutzer, der die Datei hochgeladen hat, enthält.

handleUpload(): Diese Methode verarbeitet den Upload der Datei. Sie überprüft den API-Schlüssel, überprüft, ob eine Datei gesendet wurde, speichert die Datei und erstellt einen Log-Eintrag.

saveLog($conn, $logMessage, $fileName): Diese private Methode speichert einen Log-Eintrag in der Datenbank. Sie erhält die Verbindung zur Datenbank, die Log-Nachricht und den Dateinamen als Parameter und fügt einen neuen Eintrag in der Tabelle "logs" hinzu. Der Log-Eintrag enthält die Nachricht, den Dateinamen und das aktuelle Datum/Uhrzeit.

Datenbank-Tabelle "logs"
Die Tabelle "logs" speichert die Logs für die hochgeladenen Dateien. Sie enthält die folgenden Spalten:

id: Eine eindeutige ID für jeden Log-Eintrag.
message: Die Log-Nachricht, die den Dateinamen und den Hochladebenutzer enthält.
file_name: Der Name der hochgeladenen Datei.
created_at: Das Datum und die Uhrzeit, zu der der Log-Eintrag erstellt wurde.
Die Log-Einträge werden verwendet, um den Verlauf der hochgeladenen Dateien nachzuverfolgen und zu überwachen, wer welche Dateien hochgeladen hat.

Wir hoffen, dass diese Informationen Ihnen bei der Entwicklung des Upload-Interfaces helfen. Wenn Sie weitere Fragen haben, stehe ich Ihnen gerne zur Verfügung.
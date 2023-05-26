# Atlanta City API-Dokumentation

Die Atlanta City API ermöglicht Entwicklern den Zugriff auf verschiedene Funktionen und Daten für das Hochladen von Screenshots und das Verwalten von Logs.

## API-Endpunkte

### Upload-Screenshot

**Endpunkt**: `POST /upload`

Mit diesem Endpunkt können Entwickler Screenshots hochladen und als Logs speichern.

**Anforderungsparameter**:

- `api_key` (erforderlich): Der API-Schlüssel für die Autorisierung des Zugriffs.
- `file` (erforderlich): Die hochzuladende Datei (Screenshot).

**Antworten**:

- Erfolgreicher Upload: 200 OK
- Nicht autorisierter Zugriff: 401 Unauthorized
- Fehlende Datei: 400 Bad Request
- Fehler beim Hochladen: 500 Internal Server Error

### Logs abrufen

**Endpunkt**: `GET /logs`

Mit diesem Endpunkt können Entwickler die Logs abrufen, die im System gespeichert sind.

**Anforderungsparameter**:

- `api_key` (erforderlich): Der API-Schlüssel für die Autorisierung des Zugriffs.

**Antworten**:

- Erfolgreicher Abruf der Logs: 200 OK mit den Logs als JSON-Array.
- Ungültiger API-Schlüssel: 403 Forbidden mit einer Fehlermeldung.
- Fehlender API-Schlüssel: 401 Unauthorized mit einer Fehlermeldung.

### Weitere Endpunkte

#### Benutzerinformationen abrufen

**Endpunkt**: `GET /user`

Mit diesem Endpunkt können Entwickler die Informationen des aktuellen Benutzers abrufen.

**Anforderungsparameter**:

- `api_key` (erforderlich): Der API-Schlüssel für die Autorisierung des Zugriffs.

**Antworten**:

- Erfolgreicher Abruf der Benutzerinformationen: 200 OK mit den Benutzerinformationen als JSON-Objekt.
- Ungültiger API-Schlüssel: 403 Forbidden mit einer Fehlermeldung.
- Fehlender API-Schlüssel: 401 Unauthorized mit einer Fehlermeldung.

#### Benutzer aktualisieren

**Endpunkt**: `PUT /user`

Mit diesem Endpunkt können Entwickler die Informationen des aktuellen Benutzers aktualisieren.

**Anforderungsparameter**:

- `api_key` (erforderlich): Der API-Schlüssel für die Autorisierung des Zugriffs.
- `username` (optional): Der neue Benutzername.
- `password` (optional): Das neue Passwort.


<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi Nuovo Utente - FreeRADIUS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Aggiungi Nuovo Utente</h1>

    <div class="back">
        <a href="index.html">&lt;&lt; Torna Indietro</a>
    </div>

    <form action="process_user.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="framed_ip">Indirizzo IP:</label>
        <input type="text" name="framed_ip" required><br>
        <label for="max_down">Max Down:</label>
        <input type="text" name="max_down" required><br>
        <label for="max_up">Max Up:</label>
        <input type="text" name="max_up" required><br>
        <input type="submit" value="Aggiungi Utente">
    </form>
</body>
</html>

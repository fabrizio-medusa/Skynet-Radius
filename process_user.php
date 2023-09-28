<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $framed_ip = $_POST["framed_ip"];
    $max_down = $_POST["max_down"];
    $max_up = $_POST["max_up"];

    $newUserConfig = "$username  Cleartext-Password := \"$password\"\n";
    $newUserConfig .= "        Service-Type = Framed-User,\n";
    $newUserConfig .= "        Framed-Protocol = PPP,\n";
    $newUserConfig .= "        Framed-IP-Address = $framed_ip,\n";
    $newUserConfig .= "        WISPr-Bandwidth-Max-Down = $max_down,\n";
    $newUserConfig .= "        WISPr-Bandwidth-Max-Up = $max_up,\n";
    $newUserConfig .= "        Framed-Compression = Van-Jacobsen-TCP-IP\n\n";

    $filename = "users"; // Nome del file di configurazione

    if (file_exists($filename)) {
        if (is_writable($filename)) {
            file_put_contents($filename, $newUserConfig, FILE_APPEND);
        } else {
            echo "Il file non ha i permessi di scrittura.";
        }
    } else {
        // Creare il file se non esiste
        file_put_contents($filename, $newUserConfig);
    }

    header("Location: index.html");
} else {
    header("Location: index.html");
}
?>

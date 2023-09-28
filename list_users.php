<!DOCTYPE html>
<html>
<head>
    <title>Lista Utenti - FreeRADIUS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* Aggiungi stile per la tabella ... */
    </style>
</head>
<body>
    <h2>Utenti Esistenti</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>IP Address</th>
            <th>Max Down</th>
            <th>Max Up</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        <?php
        $filename = "users"; // Nome del file di configurazione

        $fileContent = file_get_contents($filename);

        // Divide il file in blocchi separati per ciascun utente
        $userBlocks = preg_split("/\n\n/", $fileContent, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($userBlocks as $userBlock) {
            $matches = array();
            $pattern = '/^\s*Framed-IP-Address = (.*?),.*?WISPr-Bandwidth-Max-Down = (.*?),.*?WISPr-Bandwidth-Max-Up = (.*?),/sm';

            if (preg_match($pattern, $userBlock, $matches)) {
                $framed_ip = trim($matches[1]);
                $max_down = trim($matches[2]);
                $max_up = trim($matches[3]);

                // Estrai l'username dal blocco utente
                preg_match('/(.*?)\s+Cleartext-Password/', $userBlock, $username_matches);
                if (isset($username_matches[1])) {
                    $username = trim($username_matches[1]);

                    echo "<tr>";
                    echo "<td>$username</td>";
                    echo "<td>$framed_ip</td>";
                    echo "<td>$max_down</td>";
                    echo "<td>$max_up</td>";
                    echo "<td><a href='edit_user.php?username=$username'>Modifica</a></td>";
                    echo "<td><a href='delete_user.php?username=$username'>Elimina</a></td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </table>
 <br>
    <a href="index.html">Torna Indietro</a>

</body>
</html>

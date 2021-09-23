<!-- mail recovery with url -->
<!-- procedure :
-> Create a .php file and add the code below.
-> Modify the website url
-> Open the file in your browser to see the result
-> The result shows all the email addresses that were found on the website page -->

<!DOCTYPE HTML>
<html lang='fr'>
  <head>
    <title>Récupération mail</title>
  </head>
  <body>
    <pre>
      <center>
        <h2>Voici les adresses email récupéré via l'url :</h2>
      <?php
        # Adresse du site à "exploiter"
        $url = 'https://www.infomaniak.com/fr/hebergement/web-et-mail/hebergement-web-et-mail';   

        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);

        # Récupération des emails
        preg_match_all('`[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+`m', $data, $emails);

        # Affichage du tableau sans doublons
        $emails2= array_unique($emails[0]);
        # Affichage du tableau
        echo implode("
        ", $emails2);
      ?>
      </center>
    </pre>
  </body>
</html>

<?php
if (!isset($_SESSION)) {session_start();}

$destination = "marvin.lemarchand@student.hepl.be";
$message_send = "Votre message a bien été envoyé";
$message_not_send = "Une erreur s'est produise votre message n'a pas été envoyé";
$error = "Il y a eu une erreur avec l'envoi du formulaire";

if (!isset($_POST))
{
    //formulaire non envoyé
    $_SESSION['form'] = $error;
}
else {

    function rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc()) {
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    }

    ;

    function isEmail($email)
    {
        $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
        return (($value === 0) || ($value === false)) ? false : true;
    }

    $nom = (isset($_POST['nom'])) ? rec($_POST['nom']) : '';
    $email = (isset($_POST['email'])) ? rec($_POST['email']) : '';
    $mobile = (isset($_POST['mobile'])) ? rec($_POST['mobile']) : '';
    $message = (isset($_POST['message'])) ? rec($_POST['message']) : '';

    $email = (isEmail($email)) ? $email : '';

    if (($nom != '') && ($email != '') && ($message != '')) {
        $headers = 'From:' . $nom . ' ' . ' <' . $email . '>' . "\r\n" .
            'Reply-To:' . $email . "\r\n" .
            'Mobile Number:' . $mobile. "\r\n" .

            $message = str_replace("&#039;", "'", $message);
            $message = str_replace("&#8217;", "'", $message);
            $message = str_replace("&quot;", '"', $message);
            $message = str_replace('<br>', '', $message);
            $message = str_replace('<br />', '', $message);
            $message = str_replace("&lt;", "<", $message);
            $message = str_replace("&gt;", ">", $message);
            $message = str_replace("&amp;", "&", $message);

        $cible = $destination;

        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach ($tmp as $email_destinataire) {
            if (mail($email_destinataire, $message, $headers))
                $num_emails++;
        }

        $_SESSION['form'] = $message_send;

    } else {

        $_SESSION['form'] = $message_not_send;

    };
}
header( "Location: ./html/contact.php");
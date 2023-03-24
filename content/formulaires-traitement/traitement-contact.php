<?php
// On récupère les données du formulaire, avec TRIM qui supprime les espaces vide etc.
$nom = trim($_POST['nom-user']);
$mail = trim($_POST['mail-user']);
$motif = trim($_POST['motif']);
$message = trim($_POST['message']);

// ____________________

/*Vérifie si l'adresse mail est au bon format */
$regex_mail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
/*Verifie qu il n y est pas d en tête dans les données*/
$regex_head = '/[nr]/';

/*Vérifie qu il n y est pas d erreur dans adresse mail*/
if (!preg_match($regex_mail, $mail)) {
    $alert = sprintf("L'adresse %s n'est pas valide", $mail);
} else {
    $courriel = 1;
}
/* On affiche l'erreur s'il y en a une */
if (!empty($alert)) {
    $courriel = 0;
    // echo $alert;
}


// // On vérifie qu'il n'y ai pas de header dans les champs
// if (
//     preg_match($regex_head, $nom)
//     || preg_match($regex_head, $mail)
//     || preg_match($regex_head, $motif)
//     || preg_match($regex_head, $message)
// ) {
//     $alert = 'En-têtes interdites dans les champs du formulaire';
// } else {
//     $header = 1;
// }
// /* On affiche l'erreur s'il y en a une */
// if (!empty($alert)) {
//     $header = 0;
// }

// var_dump($header);
// die();

if (
    empty($nom)
    || empty($mail)
    || empty($message)
) {
    $alert = 'Tous les champs doivent être renseignés';
} else {
    $renseigne = 1;
}
/* On affiche l'erreur s'il y en a une */
if (!empty($alert)) {
    $renseigne = 0;
}

/* Si les variables sont bonne */
if ($renseigne == 1 AND $courriel == 1)
{
/*Envoi du mail*/

/*Le destinataire*/
$to="nataeel08120@gmail.com";

/*Le sujet du message qui apparaitra*/
$sujet="Message depuis le site";
$msg = '';

/*Le message en lui même*/
/*$msg = 'Mail envoye depuis le site' "rnrn";*/
$msg .= 'Nom : '.$nom."rnrn";
$msg .= 'Mail : '.$mail."rnrn";
$msg .= 'Motif : '.$motif."rnrn";
$msg .= 'Message : '.$message."rnrn";

/*Les en-têtes du mail*/
$headers = sprintf('From: MESSAGE DU SITE Allosimplon <nataeel08120@gmail.com>%s%s', "\r\n", "\r\n");
// $headers .= "rn";

/*L'envoi du mail - Et page de redirection*/
mail($to, $sujet, $msg, $headers);
// echo "succes";
header('Location:http://www.localhost/allosimplon/index.php');
}
else
{
    echo "error";
// header('Location:http://www.localhost/allosimplon/index.php');
}
?>
<?php
// Vérifier les champs vides
if(empty($_POST['Nom']) || empty($_POST['Mail']) || empty($_POST['Téléphone']) || empty($_POST['Message']) || !filter_var($_POST['Mail'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$Nom = strip_tags(htmlspecialchars($_POST['Nom']));
$Mail = strip_tags(htmlspecialchars($_POST['Mail']));
$Téléphone = strip_tags(htmlspecialchars($_POST['Téléphone']));
$Message = strip_tags(htmlspecialchars($_POST['Message']));

// Créez l'e-mail et envoyez le messagee
$to = "olivier.villalobo@gmail.com"; // Ajoutez votre adresse email entre "" en remplaçant votrenom@votredomaine.com - C’est ici que le formulaire enverra un message.
$subject = "Website Contact Form:  $Nom";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nNom: $Nom\n\nMail: $Mail\n\nTéléphone: $Téléphone\n\nMessage:\n$Message";
$header = "From: olivier.villalobo@gmail.com"; //C'est l'adresse email à partir de laquelle le message généré sera. Nous vous recommandons d’utiliser quelque chose comme noreply@votredomaine.com.
$header .= "Reply-To: $Mail";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>

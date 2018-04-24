<?php
/************************ CONTROLLER ***************/

// Appel du fichier SQL correspondant
require_once("models/ajouteruser.php");
require_once('lib/phpmail/PHPMailerAutoload.php');
define('SMTPUSER', 'aptsdeplv93@gmail.com'); // sec. smtp username
define('SMTPPWD', 'nathoudu93'); // sec. password
define('SMTPSERVER', 'smtp.gmail.com'); // sec. smtp server

if (isset($_POST["submit_ajout_membre"])) {
    
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email']; 
    
    if (!empty($login) && !empty($nom) && !empty($prenom) && !empty($email)) {
        if (preg_match("#^[a-zA-Z]+$#", $nom) && preg_match("#^[a-zA-Z]+$#", $prenom)) {
            if (preg_match("#[a-z0-9._-]+\.[a-z]{2,6}#", $email)) {
                $mdp  = genererMdp();
                $mdpf = $mdp;
                $mdp  = sha1($mdp);
                
                if (verificationMail($email)) {
                    
                    
                    if (AjoutUser($login, $nom, $prenom, $email, $mdp)) {
                        
                        
                        
                        $infos = "Membre bien ajouté ! ";
                        
                        
                        $subject = 'Creation de votre compte [PTUT]';
                        
                        // message
                        $message = '<body><style>.black{backgroud-color:black;}</style>
                                    <div="black"> Bonjour,<br>
                                    Votre compte a ete cree. Voici votre nom de compte et votre mot de passe : <br>Nom de compte : <strong>' . $nom . '</strong> <br> Mot de passe (copier/coller ce mot de passe) : <strong>' . $mdpf . '</strong><br>
                                    Si vous rencontrez un tierces problemes nous repondre directement sur cette adresse mail.<br>
                                    Nathan.C</div></body>';
                        
                        
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        
                        $from      = 'm2l.contact.btssio@gmail.com';
                        $from_name = 'M2L';
                        
                        if (smtpmailer($email, $from, $from_name, $subject, $message)) {
                            $infos .= "Email envoyé ! Se connecter <a href='identification'>ici</a>";
                        } else {
                            $infos .= "Erreur lors de l'envoie de mail ! ";
                        }
                        
                    } else {
                        $erreur = "Erreur lors de l'inscriptions ! ";
                    }
                    
                } else {
                    
                    $erreur = "Cette adresse mail est déjà utilisée";
                }
                
            } else {
                $erreur = "Adresse mail invalide";
            }
            
        } else {
            $erreur = "Les logins, noms et prénoms ne doivent comporter que des lettres ";
        }
        
        
    } else {
        $erreur = "Tous les champs doivent être remplis";
    }
    
}

// Appel de la vue correspondante 
require_once("views/ajouteruser.php");


?>
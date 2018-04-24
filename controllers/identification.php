<?php 

	/*********************     CONTROLLER  *****************************/
	
	// Appel du fichier SQL correspondant
	require_once ("models/identification.php");
	    require_once('lib/phpmail/PHPMailerAutoload.php');
	    define('SMTPUSER', 'ptut.contact.metinet@gmail.com'); // sec. smtp username
        define('SMTPPWD', 'nathoudu93'); // sec. password
        define('SMTPSERVER', 'smtp.gmail.com'); // sec. smtp server
	
	// Gestion formulaire de connexion 
	if(isset($_POST["submit"]))
	{
		$login = $_POST['login'];
        $mdp = $_POST['mdp'];
		
		if(!empty($login) && !empty($mdp))
		{
			$donnees = identification($login,$mdp);
			if(!empty($donnees))
			{
				$_SESSION["connecte"] = $donnees;
				
			
				header("location:pageprincipale");
				
			}
			else{
				$erreur = "Nom ou mot de pass incorrect";
			}
		}
		else
		{
			$erreur = "Veuillez remplir tous les champs";
		}
	}
	
	
	if (isset($_POST["submit_mdp"]))
	{
		extract($_POST);
		
		if(isset($email) && !empty($email))
		{
			if (verifierEmail($email))
			{
				
				$mdp = "";
				$choix = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.;/^*";
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(61,67)];
				$mdp .= $choix[rand(61,67)];
				$mdp = str_shuffle($mdp);
				
				if (modifierMdp($mdp,$email))
				{
					
                   

    
                        $subject = 'Mot de passe oublie [M2L]';

                        // message
                        $message = '<body><style>.black{backgroud-color:black;}</style>
                                    <div="black"> Bonjour,<br>
                                    Voici votre nouveau mot de passe : (copier/coller ce mot de passe) : <strong>'.$mdp.'</strong><br>
                                    Si vous rencontrez dautres problemes nous repondre directement sur cette adresse mail.<br>
                                    Nathan.C</div></body>';

    
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    
                        $from = 'm2l.contact.btssio@gmail.com';
                        $from_name = 'M2L';
                   
                                    if(smtpmailer($email, $from, $from_name, $subject, $message))
                {header("location:index.php?infos=Un email avec votre nouveau mot de passe vous a été envoyé ! (pensez à vérifier vos spams)");}
                    
                    else
                    {echo "c'est pas bon";}
                   
					
				}
				else
				{
					$erreur = "Une erreur est survenue";
				}
			}
			else
			{
				$erreur = "Adresse mail non reconnue";
			}
		}
		else
		{
			$erreur = "Veuillez renseigner votre adresse e-mail";
		}
	}
	
	if(isset($_GET["erreur"]))
	{
		$erreur = $_GET["erreur"];
	}
	
	if (isset($_GET["infos"]))
	{
		$infos = $_GET["infos"];
	}
	
	// Appel de la vue correspondante 
	require_once("views/identification.php");

?>
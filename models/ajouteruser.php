<?php 
/********************** MODEL **************/
 require_once('lib/phpmail/PHPMailerAutoload.php');


	function AjoutUser($login,$nom,$prenom,$email,$mdp)
	{
		global $bdd;
				$sql = " INSERT INTO user(login,nom,prenom,email,mdp) VALUES (:login,:nom,:prenom,:email,:mdp)";
				$req = $bdd -> prepare($sql);
                $req -> bindValue(":login",$login,PDO::PARAM_STR);
				$req -> bindValue(":nom",strtolower($nom),PDO::PARAM_STR);
        	    $req -> bindValue(":prenom",$prenom,PDO::PARAM_STR);
                $req -> bindValue(":email",$email,PDO::PARAM_STR);
				$req -> bindValue(":mdp",$mdp,PDO::PARAM_STR);
				$req -> execute();
				return true;
		}
	

	function smtpmailer($to, $from, $from_name, $subject, $body) {
	global $error;

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   
    $mail->Host = SMTPSERVER;
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = SMTPUSER;
    $mail->Password = SMTPPWD;
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);

     $mail->Send();
        
        return true;

}
	function genererMdp()
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
				
				return $mdp;
	}
	
	

	
	function verificationMail($mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM user WHERE email = :email");
		
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		
		$requete -> execute();
		
		$res = $requete -> fetchAll();
		
		if(!empty($res))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>
<?php 

/* ****************    MODEL **********************/

		    require_once('lib/phpmail/PHPMailerAutoload.php');
	   

	
	
	
	function smtpmailer($to, $from, $from_name, $subject, $body) {
	global $error;

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
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

	function identification($login,$mdp)
	{
		global $bdd;
		$requete = $bdd -> prepare("SELECT * FROM user WHERE login = :login AND mdp = :mdp ");
		$requete -> bindValue(":login",$login,PDO::PARAM_STR);
		$requete -> bindValue(":mdp",sha1($mdp),PDO::PARAM_STR);
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
	
	function verifierEmail($mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("SELECT * FROM user WHERE email = :email");
		
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		$requete -> execute();
		
		$rows = $requete -> fetchAll();
		
		if(!empty($rows))
		{
			return true;
		}
		return false;
		
		
	}
	
	function modifierMdp($mdp,$mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("UPDATE user SET mdp = :mdp WHERE email = :email");
		
		$requete -> bindValue(":mdp",sha1($mdp),PDO::PARAM_STR);
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		
		$requete -> execute();
		return true;
	}
	

	
	
	
	
	
	
?>
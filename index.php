<?php 

	require_once("models/connect.php");

	if(isset($_GET["page"]))
	{
          if ($_GET["page"] == "panel")

          {
				if (isset($_SESSION["connecte"]) && !empty($_SESSION["connecte"]))
				
				{
					$_GET['page'] = "panel";
				}
				else
				{
					$erreur = "Vous devez être connecté pour voir cette page";
				$_GET['page'] = "identification";
				}
			}
      
        
		if (file_exists("controllers/".$_GET["page"].".php"))
		{
			
			  $_GET['page'] = $_GET["page"];
		}
        else
		{
			$_GET['page'] = "404";
		}
	}
    else
    {
		$_GET['page'] = "pageprincipale";
}
		

ob_start();
include "controllers/".$_GET['page'].".php";
$contenu = ob_get_contents();
ob_end_clean();	
require "views/layout.php";


  
		
?>

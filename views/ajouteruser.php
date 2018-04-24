<div class="container" id="ajout_membre">
    <?php
					if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
					?>
        <div class="row">
            <form class="col s12 m6 offset-m3" method="post" action="#">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="login" type="text" class="validate" name="login">
                        <label for="login">Login</label>
                    </div>
                       <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nom" type="text" class="validate" name="nom">
                        <label for="nom">Nom</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="prenom" type="text" class="validate" name="prenom">
                        <label for="prenom">Prénom</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">cloud_queue</i>
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Adresse Mail</label>
                    </div>
                </div>


                <button class="waves-effect waves-light btn blue accent-1 right" type="submit" name="submit_ajout_membre">
				Créer <i class="material-icons right">edit</i>
				</button>
            </form>
        </div>
</div>

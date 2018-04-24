<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="erreurDiv valign-wrapper">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 offset-m2 l8 offset-l2">
            <div class="card hoverable">
                <div class="card-content">
                    <span class="card-title">Connectez-vous</span>

                    <div class="row">
                        <form class="col s12 m12 l12" method="post" action="#">
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <input id="login" type="text" class="validate" name="login" > <label for="nom">Login</label>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <input id="mdp" type="password" class="validate" name="mdp"> <label for="mdpk">Mot de passe</label>
                                </div>
                                <button class="waves-effect waves-light btn blue accent-1 right col l3 s10 m8 pull-m1 pull-s1" type="submit" name="submit">
										connexion <i class="material-icons right">send</i>
									</button>
                            </div>
                        </form>
                        <a class="waves-effect waves-light modal-trigger" href="#modal1">Mot de passe oublié ?</a><br>
                        <a class="waves-effect waves-light modal-trigger" href="ajouteruser">Créer un compte</a>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4>Réinitialisation de mot de passe</h4>
                                <p>Veuillez renseigner l'adresse mail correspondante au compte M2L</p>
                                <form method="post">
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12">
                                            <div class="input-field col s12">
                                                <input id="email" type="email" class="validate" name="email" >
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="waves-effect waves-light btn blue accent-1 right" type="submit" name="submit_mdp">
										Envoyer <i class="material-icons right">send</i>
										</button>
                                </form>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

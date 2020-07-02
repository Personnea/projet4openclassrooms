<?php

session_start();

$nom_module = "accueil";

if ( isset( $_GET[ 'module' ] ) ) {

	$nom_module = htmlspecialchars( $_GET[ 'module' ] );
	
}

switch ( $nom_module ) {

	case 'accueil':
		require_once( 'controllers/controller_accueil.php' );
		$module = new ControllerAccueil();
		break;
	case 'articles':
		require_once( 'controllers/controller_articles.php' );
		$module = new ControllerArticles();
		break;

	case 'inscription':
		require_once( 'controllers/controller_inscription.php' );
		$module = new ControllerInscription();
		break;

	case 'connexion':
		require_once( 'controllers/controller_connexion.php' );
		$module = new ControllerConnexion();
		break;

	case 'admin':
		if(isset($_SESSION['pseudo'])){
			require_once( 'controllers/controller_admin.php');
			$module = new ControllerAdmin();
			break;			
		}
		else{
			header( 'Location: index.php?module=accueil' );
			break;
		}

	case 'deconnexion':
		$_SESSION[ 'pseudo' ] = null;
        $_SESSION[ 'mail' ] = null;
		$_SESSION[ 'password'] = null;
		$_SESSION[ 'admin'] = null;
		
	default:
		require_once( 'controllers/controller_accueil.php' );
		$module = new ControllerAccueil();
		break;
}
?>
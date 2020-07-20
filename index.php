<?php

session_start();

$nom_module = "home";

if ( isset( $_GET[ 'module' ] ) ) {

	$nom_module = htmlspecialchars( $_GET[ 'module' ] );
	
}

switch ( $nom_module ) {

	case 'home':
		require_once( 'controllers/controller_home.php' );
		$module = new ControllerHome();
		break;
	case 'articles':
		require_once( 'controllers/controller_articles.php' );
		$module = new ControllerArticles();
		break;

	case 'registration':
		require_once( 'controllers/controller_registration.php' );
		$module = new ControllerRegistration();
		break;

	case 'connexion':
		require_once( 'controllers/controller_connexion.php' );
		$module = new ControllerConnexion();
		break;

	case 'comment':
		require_once( 'controllers/controller_comment.php' );
		$module = new ControllerComment();
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

	case 'logout':
		$_SESSION[ 'pseudo' ] = null;
        $_SESSION[ 'email' ] = null;
		$_SESSION[ 'password'] = null;
		$_SESSION[ 'admin'] = null;
		
	default:
		require_once( 'controllers/controller_home.php' );
		$module = new ControllerHome();
		break;
}
?>
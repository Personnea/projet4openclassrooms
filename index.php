<?php

$nom_module = "accueil";

if ( isset( $_GET[ 'module' ] ) ) {

	$nom_module = htmlspecialchars( $_GET[ 'module' ] );
}

switch ( $nom_module ) {

	case 'accueil':
		require_once( 'controllers/controller_accueil.php' );
		$module = new ControllerAccueil();
		break;

	default:
		require_once( 'controllers/controller_accueil.php' );
		$module = new ControllerAccueil();
		break;
}
?>
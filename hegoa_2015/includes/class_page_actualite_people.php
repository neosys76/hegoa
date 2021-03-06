<?php
// ======================================================================
// Auteur : Donatien CELIA
// Licence : CeCILL v2
// ======================================================================

error_reporting(E_ALL);

require "class_page.php";                                              // - On inclut la class Page

class PageActualitePeople extends Page
{
    function __construct()
    {
      // - on appele le constructeur du parent
      parent::__construct();

      // - on renseigne qq infos du parent
      parent::SetNomPage( "actualite","Actualité - People");
      parent::SetAffichageHeader( -1 );
      parent::SetAffichageFooter( 0 );
      /*  Les traductions   */  
       $this->traductions = $this->getTraductions();
		//  On récupère les traductions définies
		 $les_traductions = $this->traductions;
		 
      $this->AjouterCSS("page_actualite.css");

      // - on ajoute les contenus utiles
      $this->AjouterContenu("contenu", "contenus/page_actualite_people.php");

      // - on ajoute les menus utiles
      //    Pas de menu
    }

    // - Affichage de la page
    public function Afficher()
    {
		
      $_SESSION['actualite_libelle'] = array();
      $_SESSION['actualite_date_creation'] = array();
		
      // - On récupère les données des djuns
      $sql  = "SELECT libelle, date_creation FROM \"libertribes\".\"ACTUALITE\" WHERE type = 'PEOPLE' order by date_creation DESC";
      $result = $this->db_connexion->Requete( $sql );
      if ($result)
      {
        $iCpt = 0;
        while ($row = pg_fetch_row($result) )
        {
          // - on stocke les messages
          $_SESSION['actualite_libelle'][$iCpt]         = $row[0];
          $_SESSION['actualite_date_creation'][$iCpt]   = $row[1]; 
          
          $iCpt++;
        }

        $_SESSION['actualite_compteur'] = $iCpt;
      }
      
       else {$this->message = $this->traductions["probleme-acces-table-actualite"][$_SESSION['lang']];}

      parent::Afficher();
    }// - Fin de la fonction Afficher
    
	public function getTraductions(){
    	$traductions["probleme-acces-table-actualite"] = array(
    		"fr"=>"Problème d&#39;accès à la table ACTUALITE",
    		"en"=>"",
    		"es"=>"",
    		"de"=>""
    	);
    	
    	return $traductions;
    }

}// - Fin de la classe

?>
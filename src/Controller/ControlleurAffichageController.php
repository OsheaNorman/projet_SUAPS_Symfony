<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\VuePresence;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class ControlleurAffichageController extends ControlleurLienController
{
    //Les fonctions 
	/** 
	 * Permet de renvoyer un tableau où dans chaque tableau on stock les données des étudiants selon une limite
	 * Cela permet d'afficher trois colonne sur la page web dont la première colonne contient le premier tableau et ainsi de suite 
	 * Utilisé dans la route "Liste_etudiant_present"
	 */
	public function Tab($tab, $debut, $fin){
		$result = array();

		if(count($tab)==0)
			return null;

		if($fin > count($tab))
			$fin = count($tab);

		for($i = $debut; $i < $fin; $i++)
			$result[$i] = $tab[$i];

		return $result;
    }
    
    /**
     * @Route("/affichage", name="controlleur_affichage")
     */
    public function index()
    {
        return $this->redirectToRoute("Liste_etudiant_present",array("retour" => 0));
    }

	/**
     * @Route("/controlleur/listePersonne/{retour}",name="Liste_etudiant_present")
	*/
	//Cette route permet de réaliser l'affichage sur l'écran et l'application android 
    public function printScreen($retour,SessionInterface $session)
    {


        // Récupération de la variable session 'utilisateur' pour tester si l'utilisateur est authentifié
        $session_utilisateur = $session->get("utilisateur");


        if(isset($session_utilisateur)){

            $tableVuePresence = $this->LogiqueInterne();

		//variable pour stocker la date actuelle (NOW)
		$dateActuelle = new \DateTime();
		$tablePresents = array(); //Nouveau tableau contenant la vue "vue_presence" et le temps de la séance d'un étudiant

		//Récupération de la limite de personnes max et du temps de la seance dans la table "aua_liste_seance"
		$auaListeSeance = "SELECT * FROM aua_liste_seance";
		$etatSeance = $this->getDoctrine()->getManager()->getConnection()->prepare($auaListeSeance);
		$etatSeance->execute();
		$tableAuaListeSeance = $etatSeance->fetchAll(); //Stocke dans un tableau "$tableAuaListeSeance" notre table "aua_liste_presence"

		//pour chaque données recuperées précédemment on les stock dans des variables
		$capacite = $tableAuaListeSeance['0']['limitePersonnes'];
		$tempsMinimum = $tableAuaListeSeance['0']['tempsSeance'];

		//représente la durée des 15 minutes pour la couleur orange
		$minute15 = new \DateTime('00:15:00');

		//Calcul du temps de la séance de l'étudiant
		//temps_seance = date_actuelle - date_inscription
		foreach($tableVuePresence as $result){
			$tempsResult = $result['temps'];
			$dateInscrit = new \DateTime($tempsResult);
			$intervalle = date_diff($dateActuelle,$dateInscrit);
			$value = $intervalle->format('%H:%I');

			$targetTime = $tempsMinimum;
			$tempsCouleurOrange = new \DateTime($targetTime);
			$dateCouleurOrange = date_diff($tempsCouleurOrange,$minute15);
			$minuteCouleurOrange = $dateCouleurOrange->format('%H:%I');

			$result['duree'] = $value; //Nouvelle donnée dans le tableau "$tablePresents" qui est la durée de l'étudiant (le temps)
			$result['orange'] = $minuteCouleurOrange;

			/* Affichage des photos : conversion du type  blob en base64 (string) */
			$image = base64_encode( $result['photo'] );
			$result['photo'] = $image;

			array_push($tablePresents,$result);
		}

		/*
			Decoupage de mon tableau $tablePresents en trois tableau selon une limite donnée en brute 
		*/

		$tab1 = self::Tab($tablePresents,0,10);
		$tab2 = self::Tab($tablePresents,10,20);
		$tab3 = self::Tab($tablePresents,20,30);	

		$tailleDuTableauPresent = count($tablePresents); /* besoin pour afficher sur la page */
		
		//il y a deux sorties pour cette fonction
			//retour = 1 pour l'affichage des données sur l'application android (encoder les données)
			//retour != 1 pour l'affichage des données sur l'ecran renvoi un rendu sur un fichier twig
		
		if($retour == 1){		
			echo json_encode($tablePresents);
			return new Response('');
		}
		else{
        	return $this->render('controlleur_affichage/listeEtudiantPresent.html.twig', [
				'liste_presence' => 'Liste des étudiants',
				'premiereColonne' => $tab1,
				'deuxiemeColonne' => $tab2,
				'troisiemeColonne' => $tab3,
				'dateActuelle' => $dateActuelle,
				'capacite' => $capacite,
				'tempsMinimums' => $tempsMinimum,
				'minute15' => $minute15,
				'tailleDuTableauPresent' => $tailleDuTableauPresent
        	]);
		}

        }else{

            return $this->redirectToRoute("login");
        }
	}
}

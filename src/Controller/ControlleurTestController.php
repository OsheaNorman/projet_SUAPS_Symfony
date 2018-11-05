<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\VuePresence;


class ControlleurTestController extends AbstractController
{
    //-----------------------------------------------------------------------------------------------------------------------------------------------------   
    /**
     * @Route("/controlleur/test", name="controlleur_test")
     */
    public function index()
    {
        return $this->render('controlleur_test/index.html.twig', [
            'controller_name' => 'ControlleurTestController',
        ]);
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/controlleur/badgeage/{no_mifare_inverse}", name="controlleur_badgeage")
     */
    public function badgeage($no_mifare_inverse)
    {
        // On vérifie que le no_mifare_inverse se trouve dans l'un des 3 tables :
        // aua_etudiant_unicampus, aua_personnel_unicampus, aua_autre_unicampus
        // -> ensuite renvoyer no_mifare_inverse et le no_individu correspondant
        // Attention, ces 3 tables ne sont pas des entités, il faut faire une requête SQL brute

        $queryNumero = $this->getDoctrine()->getManager();
        $queryEtud = "SELECT no_individu FROM aua_etudiant_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryPers = "SELECT no_individu FROM aua_personnel_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryAutre = "SELECT no_individu FROM aua_autre_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

        $statement = $queryNumero->getConnection()->prepare($rawQuery);
        $statement->execute();
        $result = $statement->fetchAll();

        // exemple : print_r($result['0']) --> Array ( [no_individu] => 14003792 ) 
        if (sizeof($result) != 0) {
            return $this->redirectToRoute('vuePresenceUpdate', $result[0]);

        } else {
            // return valeur 0 pour dire que cette carte n'est pas enregistrée dans les tables
            return $this->redirectToRoute('vuePresenceUpdate', array("no_individu" => 0));
        }
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------------------
 
    /**
     * @Route("/controlleur/vuePresenceUpdate/{no_individu}", name="vuePresenceUpdate")
     */
    public function vuePresenceUpdate($no_individu)
    {
	
	//dans le cas ou le numero de carte n'est pas enregistrée on renvoi un message d'erreur a l'android 
	//et on redirige vers une route "tampon" 
	if($no_individu == 0){
		return $this->redirectToRoute('controlleur_test');		
	}

	//---------------------------------------------------------- Récupérations des données sur 

	
	//recuperation du no_mifare_inverse a partir de no_individu
	$queryNumeroMifare = $this->getDoctrine()->getManager();
        $queryEtud = "SELECT no_mifare_inverse FROM aua_etudiant_unicampus WHERE no_individu = '$no_individu'";
        $queryPers = "SELECT no_mifare_inverse FROM aua_personnel_unicampus WHERE no_individu = '$no_individu'";
        $queryAutre = "SELECT no_mifare_inverse FROM aua_autre_unicampus WHERE no_individu = '$no_individu'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

	$statement = $queryNumeroMifare->getConnection()->prepare($rawQuery);
        $statement->execute();
        $resultNumeroMifare = $statement->fetchAll();
		

	//la table VuePresence 
	$vuePresenceData = $this->getDoctrine()
               ->getRepository(VuePresence::class)
               ->createQueryBuilder('v')
               ->select('v')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
	

	//la limite de personnes Max et temps seance
	$queryLimiteTemps = $this->getDoctrine()->getManager();
	$rawQuery = "SELECT limitePersonnes,tempsSeance FROM aua_liste_seance";

	$statement = $queryLimiteTemps->getConnection()->prepare($rawQuery);
        $statement->execute();
        $resultLimiteTemps = $statement->fetchAll();

	
	//nom,prenom a partir du numero de l'individu
	$queryPersonne = $this->getDoctrine()->getManager();
	$queryEtud = "SELECT nom_usuel,prenom FROM aua_etudiant WHERE no_etudiant = '$no_individu'";
        $queryPers = "SELECT nom_usuel,prenom FROM aua_personnel WHERE no_individu = '$no_individu'";
	$queryExte = "SELECT nom,prenom FROM aua_exterieur_sport WHERE no_exterieur = '$no_individu'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryExte . " ) ";

	$statement = $queryPersonne->getConnection()->prepare($rawQuery);
        $statement->execute();
        $resultPersonne = $statement->fetchAll();

	
	//---------------------------------------------------------- Traitement des données 
	
	//si le numero de l'etudiant est present dans la vue 
	foreach($vuePresenceData as $vue){
	   if(in_array($no_individu,$vue)){
		$isPresent = true;
	   }
	}
	
	foreach($resultPersonne as $result){
		$prenom = $result['prenom'];
		$nom = $result['nom_usuel'];
	}


	foreach($resultLimiteTemps as $result){
		$limite = $result['limitePersonnes'];
		$tempsSeance = $result['tempsSeance'];
	}

	foreach($resultNumeroMifare as $result){
		$no_mifare_inverse = $result['no_mifare_inverse'];
	}


	$nombreInscrit = count($vuePresenceData);

	//---------------------------------------------------------- Update de la vue 

	
	//si l'individu est present dans la vue alors on le supprime
	//sinon si il y a assez de place on l'y ajoute 


	if(isset($isPresent)){
		echo "fin de la seance";

		//supprimer de la vue 		
		$deletePersonne = $this->getDoctrine()->getManager();
		$RAW_QUERY = "DELETE FROM vue_presence WHERE no_etudiant = '$no_individu' ";
		$statement = $queryPersonne->getConnection()->prepare($RAW_QUERY);
		$statement->execute();

		//si la personne viens de la table aua_exterieur_sport on les supprime de cette table aussi 
		if($prenom == '😱'){
			//supprimer de aua_exterieur_sport		
			$deletePersonne = $this->getDoctrine()->getManager();
			$rawQuery = "DELETE FROM aua_exterieur_sport WHERE no_exterieur = '$no_individu' ";
			$statement = $queryPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();
			
		}
		else{
			//ajout dans aua_presence_seance en OUT
			$date = new \DateTime();
			$date = date_format($date, 'Y-m-d H:i:s') . "\n";
			$ajoutIN = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_mifare_inverse','$date','OUT')";
			$statement = $ajoutIN->getConnection()->prepare($rawQuery);
			$statement->execute();
		}	
	}
	else{
	   	if($nombreInscrit < $limite){
			echo "debut de la seance";

			//ajout dans aua_presence_seance en IN
			$date = new \DateTime();
			$date = date_format($date, 'Y-m-d H:i:s') . "\n";
			$ajoutIN = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_mifare_inverse','$date','IN')";
			$statement = $ajoutIN->getConnection()->prepare($rawQuery);
			$statement->execute();

			//ajouter dans la vue 		
			$entityManager = $this->getDoctrine()->getManager();
			$Vue = new VuePresence();
			$Vue->setIdSeance(1);
			$Vue->setNom($nom);
			$Vue->setPrenom($prenom);
			$Vue->setTemps(new \DateTime());
			$Vue->setNoEtudiant($no_individu);
			$Vue->setTempsSeance(new \DateTime($tempsSeance));
			$entityManager->persist($Vue);
			$entityManager->flush();
	   	  }
	 	  else{
			echo "la limite de personne pour cette seance a été atteinte <br>";
	   	  }
		}

		return new Response('');
        }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
         * @Route("/controlleur/setSeance/{capacity}/{time}/{id}", name="setSeance")
         */ 
	public function setSeance($capacity,$time,$id){
	   	
		//recuperation des donnée depuis l'application au format setSeance/10/2:30/1
	   	$capacity = intval($capacity);
	   	$date = new \DateTime();
	   	$michaelBay = explode(":",$time);
		date_time_set($date,$michaelBay[0],$michaelBay[1]);
 	        $date = date_format($date, 'Y-m-d H:i:s');
		
		//Maj de la table aua_liste_seance
           	$setSeance = $this->getDoctrine()->getManager();
	   	$rawQuery = "Update aua_liste_seance SET limitePersonnes = '$capacity', tempsSeance = '$date' WHERE idSeance = '$id'";
	   	$statement = $setSeance->getConnection()->prepare($rawQuery);
	   	$statement->execute();

	  	return new Response('');
        }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
         * @Route("/controlleur/addPersonne/{nom}", name="addPersonne")
         */ 
	public function addPersonne($nom){

		//recuperation du temps de la seance 
		$queryTemps = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT tempsSeance FROM aua_liste_seance";
		$statement = $queryTemps->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultTemps = $statement->fetchAll();

		//recuperation du dernier numero enregistre dans la table 
		$queryIdentifiant =  $this->getDoctrine()->getManager();
		$rawQuery = "SELECT no_exterieur FROM aua_exterieur_sport WHERE no_exterieur = (SELECT MAX(no_exterieur) FROM aua_exterieur_sport)"; 
		$statement = $queryIdentifiant->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultIdentifiant = $statement->fetchAll();

		
		foreach($resultTemps as $resultT){$tempsSeance = $resultT['tempsSeance'];}
		foreach($resultIdentifiant as $result){$numero = $result['no_exterieur'];}

		
		//si il n'y a encore personne dans la table on met a la personne no_exterieur = 1000
		if(!isset($numero)){
			$numero = 1000;
			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom) VALUES ('$numero','$nom','😱')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();	
		}
		//sinon on lui met le dernier identifiant + 1
		else{
			$numero += 1;
			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom) VALUES ('$numero','$nom','😱')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();
		}


		//ajouter dans la vue peut importe la limite definie  		
		$entityManager = $this->getDoctrine()->getManager();
		$Vue = new VuePresence();
		$Vue->setIdSeance(1);
		$Vue->setNom($nom);
		$Vue->setPrenom('😱');
		$Vue->setTemps(new \DateTime());
		$Vue->setNoEtudiant($numero);
		$Vue->setTempsSeance(new \DateTime($tempsSeance));
		$entityManager->persist($Vue);
		$entityManager->flush();
		
		return new Response('');
	}
	
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

	/**
     * @Route("/controlleur/listePersonne/{retour}",name="Liste_etudiant_present")
	*/
	
	//Méthode permettant de gérer l'affichage à l'écran
   	public function printScreen($retour)
    {
		//Récupération des données de la Vue "vue_presence" directement dans la base de données

		$vuePresence = "SELECT * FROM vue_presence";
		$etatPresence = $this->getDoctrine()->getManager()->getConnection()->prepare($vuePresence);
		$etatPresence->execute();
		$tableVuePresence = $etatPresence->fetchAll(); //Stocke dans un tableau "$tableVuePresence" notre vue "vue_presence"

		//Date Actuelle
		$dateActuelle = new \DateTime();
		$tablePresents = array(); //Nouveau tableau contenant la vue "vue_presence" et le temps de la séance d'un étudiant

		//Calcul du temps de la séance de l'étudiant
		foreach($tableVuePresence as $result){
			$tempsResult = $result['temps'];
			$dateInscrit = new \DateTime($tempsResult);
			$intervalle = date_diff($dateActuelle,$dateInscrit);
			$value = $intervalle->format('%H:%I:%S');
			$result['duree'] = $value; //Nouvelle donnée dans le tableau "$tablePresents" qui est la durée de l'étudiant (le temps)
			array_push($tablePresents,$result);
		}

		//Récupération de la capacité de la table "aua_liste_seance"
		$auaListeSeance = "SELECT * FROM aua_liste_seance";
		$etatSeance = $this->getDoctrine()->getManager()->getConnection()->prepare($auaListeSeance);
		$etatSeance->execute();
		$tableAuaListeSeance = $etatSeance->fetchAll(); //Stocke dans un tableau "$tableAuaListeSeance" notre table "aua_liste_presence"

		/*
			Parcours de la table "aua_liste_seance" pour récupérer les attributs :
				- limitePersonnes pour stocker la capacité
				- tempsSeance pour stocker le temps minimum d'un étudiant
		*/

		$capacite = 0;
		$tempsMinimum = new \DateTime();

		foreach($tableAuaListeSeance as $result){
			$capacite = $result['limitePersonnes'];
			$tempsMinimum = $result['tempsSeance'];
		}
		
		if($retour == 1){		
			echo json_encode($tablePresents);
			return new Response('');
		}
		else{
        	return $this->render('controlleur_test/listeEtudiantPresent.html.twig', [
            	'liste_presence' => 'Liste des étudiants',
				'tablePresents' => $tablePresents,
				'dateActuelle' => $dateActuelle,
				'capacite' => $capacite,
				'tempsMinimum' => $tempsMinimum
        	]);
		}
	}
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
}

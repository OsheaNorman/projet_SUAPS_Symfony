<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\VuePresence;



class ControlleurTestController extends AbstractController
{

	//Les fonctions 
	//-----------------------------------------------------------------------------------------------------------------------------------------------------  
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
	//----------------------------------------------------------------------------------------------------------------------------------------------------- 
	/**
	 * La logique interne agit comme une vue sur toutes les tables
	 * Elle affiche toutes les personne actuellement présentes dans la séance 
	 * Utilisé dans les routes "vuePresenceUpdate" & "Liste_etudiant_present"
	 */
	public function LogiqueInterne(){
		$queryVuePresence = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT s.idSeance,s.tempsSeance,e.nom,e.prenom,e.temps,e.no_etudiant
					FROM aua_liste_seance s, 
					(	SELECT nom_usuel as nom,prenom as prenom,no_etudiant as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_etudiant_unicampus etuCamp ON etuCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_etudiant etud ON etuCamp.no_individu=etud.no_etudiant
						UNION
						SELECT DISTINCT nom_usuel as nom,prenom as prenom,per.no_individu as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_personnel_unicampus perCamp ON perCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_personnel per ON perCamp.no_individu=per.no_individu
						UNION
						SELECT nom as nom,prenom as prenom,no_exterieur as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_exterieur_sport perExt ON perExt.no_exterieur= se.no_mifare_inverse
					) e
					LEFT JOIN 
					(	SELECT nom_usuel as nom,prenom as prenom,no_etudiant as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_etudiant_unicampus etuCamp ON etuCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_etudiant etud ON etuCamp.no_individu=etud.no_etudiant
						UNION
						SELECT DISTINCT nom_usuel as nom,prenom as prenom,per.no_individu as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_personnel_unicampus perCamp ON perCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_personnel per ON perCamp.no_individu=per.no_individu
						UNION
						SELECT nom as nom,prenom as prenom,no_exterieur as no_etudiant,se.entreesSorties,se.temps
						FROM aua_presence_seance se 
						INNER JOIN aua_exterieur_sport perExt ON perExt.no_exterieur= se.no_mifare_inverse
					) f
					ON (e.no_etudiant = f.no_etudiant AND e.temps < f.temps)
					where e.entreesSorties like \"IN\" AND f.temps IS NULL
					ORDER BY e.temps ASC"; //oui, ça fonctionne xD
		$statement = $queryVuePresence->getConnection()->prepare($rawQuery);
		$statement->execute();
		$vuePresenceData = $statement->fetchAll();

		return $vuePresenceData;
	}
	





	//Les routes 
    //-----------------------------------------------------------------------------------------------------------------------------------------------------   
    /**
     * @Route("/controlleur/test", name="test")
     */
	//Cette route ne sert à rien pour l'instant(peut etre supprimée)
    public function index()
    {
        return $this->render('controlleur_test/index.html.twig', [
            'controller_name' => 'ControlleurTestController',
        ]);
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/controlleur/badgeage", name="badgeage")
     */
	//Cette route récupère un no_mifare_inverse et recherche le numéro_individu associé 
    public function badgeage(Request $request)
    {
		//récuperation des données depuis l'application android 
		$no_mifare_inverse = $request->request->get('numeroCarte');

        //On vérifie que le no_mifare_inverse se trouve dans l'une des 3 tables :
        //aua_etudiant_unicampus, aua_personnel_unicampus, aua_autre_unicampus
        //-> ensuite renvoyer le no_individu correspondant

        $queryNumero = $this->getDoctrine()->getManager();
        $queryEtud = "SELECT no_individu FROM aua_etudiant_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryPers = "SELECT no_individu FROM aua_personnel_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryAutre = "SELECT no_individu FROM aua_autre_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

        $statement = $queryNumero->getConnection()->prepare($rawQuery);
        $statement->execute();
        $result = $statement->fetchAll();
        //exemple : print_r($result['0']) --> Array ( [no_individu] => 14003792 ) 

		//return le numéro d'étudiant si celui-ci à été trouvé 
		//sinon return valeur 0 pour dire que cette carte n'est pas enregistrée dans les tables 
        if (sizeof($result) != 0) {
            return $this->redirectToRoute('vuePresenceUpdate', $result[0]);
        } else {
            return $this->redirectToRoute('vuePresenceUpdate', array("no_individu" => 0));
        }
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/controlleur/vuePresenceUpdate/{no_individu}", name="vuePresenceUpdate")
     */
	//Cette route met à jour tables en fonction des inscriptions/désinscriptions 
    public function vuePresenceUpdate($no_individu)
    {
		//dans le cas où le numero de carte n'est pas enregistré dans les tables 
		//on renvoi un message d'erreur à l'android 
		//et on termine l'execution de la fonction 
		if($no_individu == 0){
			$codeRetour['reponse']='Pas dans la base de données.';
			echo json_encode($codeRetour);
			return new Response('');		
	    }
	//---------------------------------------------------------- Récupérations des données sur 

		//no_mifare_inverse à partir de no_individu
		$queryNumeroMifare = $this->getDoctrine()->getManager();
		$queryEtud = "SELECT no_mifare_inverse FROM aua_etudiant_unicampus WHERE no_individu = '$no_individu'";
		$queryPers = "SELECT no_mifare_inverse FROM aua_personnel_unicampus WHERE no_individu = '$no_individu'";
		$queryAutre = "SELECT no_mifare_inverse FROM aua_autre_unicampus WHERE no_individu = '$no_individu'";
		$rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

		$statement = $queryNumeroMifare->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultNumeroMifare = $statement->fetchAll();
		

		//la logique interne 
		$vuePresenceData = self::LogiqueInterne();

		//la limite de personnes max et le temps de la seance 
		$queryLimiteTemps = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT limitePersonnes,tempsSeance FROM aua_liste_seance";

		$statement = $queryLimiteTemps->getConnection()->prepare($rawQuery);
		$statement->execute();
        $resultLimiteTemps = $statement->fetchAll();

	
		//nom,prenom de l'individu a partir de no_individu
		$queryPersonne = $this->getDoctrine()->getManager();
		$queryEtud = "SELECT nom_usuel,prenom,photo FROM aua_etudiant WHERE no_etudiant = '$no_individu'";
        $queryPers = "SELECT nom_usuel,prenom,photo FROM aua_personnel WHERE no_individu = '$no_individu'";
		$queryExte = "SELECT nom,prenom,photo FROM aua_exterieur_sport WHERE no_exterieur = '$no_individu'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryExte . " ) ";

		$statement = $queryPersonne->getConnection()->prepare($rawQuery);
        $statement->execute();
        $resultPersonne = $statement->fetchAll();


	
		//---------------------------------------------------------- Traitement des données 
	
		//si le numero de l'etudiant est present dans la vue
		//càd si l'etudiant a déjà badgé une fois dans la journée  
		//on déclare une variable isPresent qui est initialisée a true
		foreach($vuePresenceData as $vue){
		   if(in_array($no_individu,$vue)){
			$isPresent = true;
		   }
		}

		//pour chaque données recuperées précédemment on les stock dans des variables
		$prenom = $resultPersonne['0']['prenom'];
		$nom = $resultPersonne['0']['nom_usuel'];
		$photo = $resultPersonne['0']['photo'];
		$limite = $resultLimiteTemps['0']['limitePersonnes'];
		$tempsSeance = $resultLimiteTemps['0']['tempsSeance'];

		//les exterieurs n'ont pas de no_mifare_inverse donc vérifier si il est défini
		if(isset($resultNumeroMifare['0']['no_mifare_inverse'])){
			$no_mifare_inverse = $resultNumeroMifare['0']['no_mifare_inverse'];
		}
		
	
		//recupération du nombre de personne qu'il y a actuellement dans la vue 
		$nombreInscrit = count($vuePresenceData);

		//---------------------------------------------------------- Maj de la vue 

		//si l'individu est présent dans la vue 
				//si c'est quelqu'un qui à été ajouté manuellement on l'ajoute en OUT dans aua_presence_seance avec le numero qui lui a été attribué
				//si c'est quelqu'un qui à badgé on l'ajoute dans aua_presence_seance en OUT avec son no_mifare_inverse

		if(isset($isPresent)){
			//echo "fin de la séance";

			$date = new \DateTime();
			$date = date_format($date, 'Y-m-d H:i:s') . "\n";
			$ajoutOUT = $this->getDoctrine()->getManager();

			if(strlen($no_individu)<5){
				$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_individu','$date','OUT')";
			}
			else{
				$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_mifare_inverse','$date','OUT')";
			}	

			$statement = $ajoutOUT->getConnection()->prepare($rawQuery);
			$statement->execute();
			$codeRetour['reponse']='Désinscription réussie.';
			echo json_encode($codeRetour);
			
		}

		//si l'individu n'est pas présent dans la vue
			//si il y a assez de place 
				//on l'ajoute dans aua_presence_seance en IN et dans la vue 
				//on renvoi un code de retour à l'application android 
			//sinon 
				//on renvoi un code de retour à l'application android 

		else{
		   	if($nombreInscrit < $limite){
				//echo "debut de la séance";

				$date = new \DateTime();
				$date = date_format($date, 'Y-m-d H:i:s') . "\n";
				$ajoutIN = $this->getDoctrine()->getManager();
				$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_mifare_inverse','$date','IN')";
				$statement = $ajoutIN->getConnection()->prepare($rawQuery);
				$statement->execute();			
				$codeRetour['reponse']='Inscription réussie.';
				echo json_encode($codeRetour);
		   	  }
		 	  else{
				//echo "la limite de personne pour cette séance à été atteinte";

				$codeRetour['reponse']='Limite de personne atteinte.';
				echo json_encode($codeRetour);
		   	  }
		}
		return new Response('');
	}
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
	 * @Route("/controlleur/setSeance", name="setSeance")
     */ 
	//Cette route sert à modifier le temps de la seance et la limite de personne definie 
	public function setSeance(Request $request){
		
		//recuperation des données depuis l'application android 
		$capacity = $request->request->get('capacite');
		$time = $request->request->get('temps');
		$id = $request->request->get('id');
	   	
		//conversion selon les formats attendus dans la BDD 
	   	$capacity = intval($capacity);
	   	$date = new \DateTime();
	   	$michaelBay = explode(":",$time);
		date_time_set($date,$michaelBay[0],$michaelBay[1]);
 	    $date = date_format($date, 'Y-m-d H:i:s');
		
		//Màj de la table aua_liste_seance en fonction des données reçues
        $setSeance = $this->getDoctrine()->getManager();
	   	$rawQuery = "Update aua_liste_seance SET limitePersonnes = '$capacity', tempsSeance = '$date' WHERE idSeance = '$id'";
	   	$statement = $setSeance->getConnection()->prepare($rawQuery);
	   	$statement->execute();

		//code de retour vers l'android 
		$codeRetour['reponse']='Paramètres mis à jour';
		echo json_encode($codeRetour);

	  	return new Response('');
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
	 * @Route("/controlleur/sendSeance", name="sendSeance")
     */ 
	//Cette route renvoi les informations sur une seance à l'android
	public function sendSeance(){

		//récupération de la limite de personnes max et du temps de la seance 
		$querySeance = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT idSeance,limitePersonnes,CAST(tempsSeance AS TIME(0)) AS tempsSeance FROM aua_liste_seance";
		$statement = $querySeance->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultSeance = $statement->fetchAll();
		
		//renvoi de ces informations vers l'android 
		echo json_encode($resultSeance);
	  	return new Response('');
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
     * @Route("/controlleur/addPersonne", name="addPersonne")
     */ 
	//Cette route permet d'ajouter une personne manuellement (sans badge)
	public function addPersonne(Request $request){
		
		//recuperation des données depuis l'application android 
		$nom = $request->request->get('nom');
		$prenom = $request->request->get('prenom');

		//attribution d'une photo par défault a l'individu 
		$photo = fopen('/home/etudiant/blog/img/etud.png','rb');

		//récuperation du temps de la séance sur la table aua_liste_seance
		$queryTemps = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT tempsSeance FROM aua_liste_seance";
		$statement = $queryTemps->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultTemps = $statement->fetchAll();

		//récuperation du dernier numero enregistré dans la table 
		$queryIdentifiant =  $this->getDoctrine()->getManager();
		$rawQuery = "SELECT no_exterieur FROM aua_exterieur_sport WHERE no_exterieur = (SELECT MAX(no_exterieur) FROM aua_exterieur_sport)"; 
		$statement = $queryIdentifiant->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultIdentifiant = $statement->fetchAll();


		//pour chaque données recuperées précédemment on les stock dans des variables
		$tempsSeance = $resultTemps['0']['tempsSeance'];
		if(isset($resultIdentifiant['0']['no_exterieur'])){
			$numero = $resultIdentifiant['0']['no_exterieur'];
		}
		else{
			$numero = 1000;
		}


		$date = new \DateTime();
		$date = date_format($date, 'Y-m-d H:i:s');
		
		
		//si il n'y a encore personne dans la table
		//on met à la personne qu'on ajoute no_exterieur = 1000
		if(!isset($numero)){
			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom,photo) VALUES ('$numero','$nom','$prenom','$photo')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();	

			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$numero','$date','IN')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();				
		}
		//sinon on lui met le dernier identifiant + 1 (no_exterieur + 1)
		else{
			$numero += 1;
			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom,photo) VALUES ('$numero','$nom','$prenom','$photo')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();

			$queryAddPersonne = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$numero','$date','IN')";
			$statement = $queryAddPersonne->getConnection()->prepare($rawQuery);
			$statement->execute();	
		}

		$codeRetour['reponse']='Personne ajoutée';
		echo json_encode($codeRetour);
		
		return new Response('');
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
     * @Route("/controlleur/listePersonne/{retour}",name="Liste_etudiant_present")
	*/
	//Cette route permet de réaliser l'affichage sur l'écran et l'application android 
   	public function printScreen($retour)
    {
		//on appelle la logique Interne 
		$tableVuePresence = self::LogiqueInterne();

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

		//Calcul du temps de la séance de l'étudiant
		//temps_seance = date_actuelle - date_inscription
		foreach($tableVuePresence as $result){
			$tempsResult = $result['temps'];
			$dateInscrit = new \DateTime($tempsResult);
			$intervalle = date_diff($dateActuelle,$dateInscrit);
			$value = $intervalle->format('%H:%I');

			$targetTime = $tempsMinimum;
			$tempsCouleurOrange = new \DateTime($targetTime);
			$dateCouleurOrange = date_diff($tempsCouleurOrange,new \DateTime('00:15:00'));
			$minuteCouleurOrange = $dateCouleurOrange->format('%H:%I:%S');

			$result['duree'] = $value; //Nouvelle donnée dans le tableau "$tablePresents" qui est la durée de l'étudiant (le temps)
			$result['orange'] = $minuteCouleurOrange;

			array_push($tablePresents,$result);
		}

		
		//Decoupage du tableau $tablePresents en trois tableau selon une limite donnée en brute 
		$tab1 = self::Tab($tablePresents,0,12);
		$tab2 = self::Tab($tablePresents,12,24);
		$tab3 = self::Tab($tablePresents,24,count($tablePresents));
		
		//il y a deux sorties pour cette fonction
			//retour = 1 pour l'affichage des données sur l'application android (encoder les données)
			//retour != 1 pour l'affichage des données sur l'ecran renvoi un rendu sur un fichier twig
		
		if($retour == 1){		
			echo json_encode($tablePresents);
			return new Response('');
		}
		else{
        	return $this->render('controlleur_test/listeEtudiantPresent.html.twig', [
				'liste_presence' => 'Liste des étudiants',
				'premiereColonne' => $tab1,
				'deuxiemeColonne' => $tab2,
				'troisiemeColonne' => $tab3,
				'dateActuelle' => $dateActuelle,
				'capacite' => $capacite,
				'tempsMinimums' => $tempsMinimum
        	]);
		}
	}
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
}

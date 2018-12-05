<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

//appel des fichiers entités 
use App\Entity\AuaListeSeance;
use App\Entity\AuaExterieurSport;
use App\Entity\AuaPresenceSeance;


class ControlleurLienController extends AbstractController
{

	//La logique interne 
	//----------------------------------------------------------------------------------------------------------------------------------------------------- 
	/**
	 * La logique interne agit comme une vue sur toutes les tables
	 * Elle affiche toutes les personne actuellement présentes dans la séance 
	 * Utilisée dans les routes ControlleurLienController -> "vuePresenceUpdate" & ControlleurAffichageController -> "Liste_etudiant_present"
	 */
	public function LogiqueInterne(){
		$entityManager = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT s.idSeance,s.tempsSeance,e.nom,e.prenom,e.temps,e.no_etudiant,e.photo
					FROM aua_liste_seance s, 
					(	SELECT nom_usuel as nom,prenom as prenom,no_etudiant as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_etudiant_unicampus etuCamp ON etuCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_etudiant etud ON etuCamp.no_individu=etud.no_etudiant
						UNION
						SELECT DISTINCT nom_usuel as nom,prenom as prenom,per.no_individu as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_personnel_unicampus perCamp ON perCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_personnel per ON perCamp.no_individu=per.no_individu
						UNION
						SELECT nom as nom,prenom as prenom,no_exterieur as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_exterieur_sport perExt ON perExt.no_exterieur= se.no_mifare_inverse
					) e
					LEFT JOIN 
					(	SELECT nom_usuel as nom,prenom as prenom,no_etudiant as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_etudiant_unicampus etuCamp ON etuCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_etudiant etud ON etuCamp.no_individu=etud.no_etudiant
						UNION
						SELECT DISTINCT nom_usuel as nom,prenom as prenom,per.no_individu as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_personnel_unicampus perCamp ON perCamp.no_mifare_inverse= se.no_mifare_inverse
						INNER JOIN aua_personnel per ON perCamp.no_individu=per.no_individu
						UNION
						SELECT nom as nom,prenom as prenom,no_exterieur as no_etudiant,se.entreesSorties,se.temps,photo
						FROM aua_presence_seance se 
						INNER JOIN aua_exterieur_sport perExt ON perExt.no_exterieur= se.no_mifare_inverse
					) f
					ON (e.no_etudiant = f.no_etudiant AND e.temps < f.temps)
					where e.entreesSorties like \"IN\" AND f.temps IS NULL
					ORDER BY e.temps ASC";
		$queryVuePresence = $entityManager->getConnection()->prepare($rawQuery);
		$queryVuePresence->execute();
		$vuePresenceData = $queryVuePresence->fetchAll();

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
     * @Route("/controlleur/connexion", name="connexion")
     */
	//Cette route sert à confirmer à l'application Android qu'elle est bien connectée au serveur  
    public function connexion()
    {
        $codeRetour['reponse']='Connexion réussi.';
		return new Response(json_encode($codeRetour));	
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/controlleur/badgeage", name="badgeage")
     */
	//Cette route récupère un no_mifare_inverse et recherche le numero_individu associé 
    public function badgeage(Request $request)
    {
		//récuperation des données depuis l'application android 
		$no_mifare_inverse = $request->request->get('numeroCarte');

        //On vérifie que le no_mifare_inverse se trouve dans l'une des 3 tables :
        //aua_etudiant_unicampus, aua_personnel_unicampus, aua_autre_unicampus
        //-> ensuite renvoyer le no_individu correspondant

		$queryEtud = "SELECT no_individu FROM aua_etudiant_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryPers = "SELECT no_individu FROM aua_personnel_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryAutre = "SELECT no_individu FROM aua_autre_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";
        $entityManager = $this->getDoctrine()->getManager();
        $queryNumero = $entityManager->getConnection()->prepare($rawQuery);
        $queryNumero->execute();
        $resultNumero = $queryNumero->fetchAll();
        //exemple : print_r($resultNumero['0']) --> Array ( [no_individu] => 14003792 ) 
		

		//return le numéro d'étudiant si celui-ci à été trouvé 
		//sinon return valeur 0 pour dire que cette carte n'est pas enregistrée dans les tables 
        if (sizeof($resultNumero) != 0) {
            return $this->redirectToRoute('vuePresenceUpdate', $resultNumero[0]);
        } else {
            return $this->redirectToRoute('vuePresenceUpdate', array("no_individu" => 0));
        }
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * @Route("/controlleur/vuePresenceUpdate/{no_individu}", name="vuePresenceUpdate")
     */
	//Cette route met à jour la table aua_presence_seance en fonction des inscriptions/désinscriptions 
    public function vuePresenceUpdate($no_individu)
    {
		//dans le cas où le numero de carte n'est pas enregistré dans les tables 
		//on renvoi un message d'erreur à l'android 
		//et on termine l'execution de la fonction 
		if($no_individu == 0){
			$codeRetour['reponse']='0Personne non inscrite.';
			return new Response(json_encode($codeRetour));		
	    }
	//---------------------------------------------------------- Récupérations des données sur 

		//la logique interne 
		$vuePresenceData = self::LogiqueInterne();
		

		//no_mifare_inverse à partir de no_individu
		$queryEtud = "SELECT no_mifare_inverse FROM aua_etudiant_unicampus WHERE no_individu = '$no_individu'";
		$queryPers = "SELECT no_mifare_inverse FROM aua_personnel_unicampus WHERE no_individu = '$no_individu'";
		$queryAutre = "SELECT no_mifare_inverse FROM aua_autre_unicampus WHERE no_individu = '$no_individu'";
		$rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";
		$entityManager = $this->getDoctrine()->getManager();
		$queryNumeroMifare = $entityManager->getConnection()->prepare($rawQuery);
		$queryNumeroMifare->execute();
		$resultNumeroMifare = $queryNumeroMifare->fetchAll();
		
		
		//la limite de personnes max et le temps de la seance 
		$rawQuery = "SELECT limitePersonnes,tempsSeance FROM aua_liste_seance";
		$entityManager = $this->getDoctrine()->getManager();
		$queryLimiteTemps = $entityManager->getConnection()->prepare($rawQuery);
		$queryLimiteTemps->execute();
        $resultLimiteTemps = $queryLimiteTemps->fetchAll();

	
		//nom,prenom de l'individu a partir de no_individu
		$queryEtud = "SELECT nom_usuel,prenom FROM aua_etudiant WHERE no_etudiant = '$no_individu'";
        $queryPers = "SELECT nom_usuel,prenom FROM aua_personnel WHERE no_individu = '$no_individu'";
		$queryExte = "SELECT nom,prenom FROM aua_exterieur_sport WHERE no_exterieur = '$no_individu'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryExte . " ) ";
		$entityManager = $this->getDoctrine()->getManager();
		$queryPersonne = $entityManager->getConnection()->prepare($rawQuery);
        $queryPersonne->execute();
        $resultPersonne = $queryPersonne->fetchAll();

	
		//---------------------------------------------------------- Traitement des données 
	
		//si le numero de l'etudiant est present dans la vue
		//càd si l'étudiant à déjà badgé une fois dans la journée  
		//on déclare une variable isPresent qui est initialisée à true
		foreach($vuePresenceData as $vue){
		   if(in_array($no_individu,$vue)){
			$isPresent = true;
		   }
		}

		//pour chaque données recuperées précédemment on les stock dans des variables
		$prenom = $resultPersonne['0']['prenom'];
		$nom = $resultPersonne['0']['nom_usuel'];
		$limite = $resultLimiteTemps['0']['limitePersonnes'];
		$tempsSeance = $resultLimiteTemps['0']['tempsSeance'];

		//les exterieurs n'ont pas de no_mifare_inverse donc vérifier si il est défini
		if(isset($resultNumeroMifare['0']['no_mifare_inverse'])){
			$no_mifare_inverse = $resultNumeroMifare['0']['no_mifare_inverse'];
		}
		
	
		//recupération du nombre de personne qu'il y a actuellement dans la vue 
		$nombreInscrit = count($vuePresenceData);

		//---------------------------------------------------------- Màj des tables 
		//si l'individu est présent dans la vue 
				//si c'est quelqu'un qui à été ajouté manuellement on l'ajoute en OUT dans aua_presence_seance avec le numero qui lui à été attribué
				//si c'est quelqu'un qui à badgé on l'ajoute dans aua_presence_seance en OUT avec son no_mifare_inverse

		if(isset($isPresent)){
			//fin de la séance;

			$entityManager = $this->getDoctrine()->getManager();
			$PresenceSeance = new AuaPresenceSeance();
 
			if(!isset($resultNumeroMifare['0']['no_mifare_inverse'])){	
				$PresenceSeance->setNoMifareInverse($no_individu);
			}
			else{
				$PresenceSeance->setNoMifareInverse($no_mifare_inverse);
			}	
			$PresenceSeance->setIdSeance(1);
			$PresenceSeance->setTemps(new \DateTime());
			$PresenceSeance->setEntreesSorties("OUT");
			$entityManager->persist($PresenceSeance);
			$entityManager->flush();

			//code de retour vers l'android 
			$codeRetour['reponse']='2Désinscription réussie.';
			return new Response(json_encode($codeRetour));
			
		}

		//si l'individu n'est pas présent dans la vue
			//si il y a assez de place 
				//on l'ajoute dans aua_presence_seance en IN 
				//on renvoi un code de retour à l'application android 
			//sinon 
				//on renvoi un code de retour à l'application android 

		else{
		   	if($nombreInscrit < $limite){
				//debut de la séance;

				$entityManager = $this->getDoctrine()->getManager();
				$PresenceSeance = new AuaPresenceSeance();
				$PresenceSeance->setIdSeance(1);
				$PresenceSeance->setNoMifareInverse($no_mifare_inverse);				
				$PresenceSeance->setTemps(new \DateTime());
				$PresenceSeance->setEntreesSorties("IN");
				$entityManager->persist($PresenceSeance);
				$entityManager->flush();

				
				//on renvoi à l'android un message (easter egg pour les enseignants de M1 informatique)
				//supprimer le if et conserver le else pour retirer le message personnalisé 
				if($no_mifare_inverse == "04548E32A73A80" || $no_mifare_inverse == "045C6CCA253980" || $no_mifare_inverse == "043637F2813A80" || $no_mifare_inverse == "0475511A543680"){
					$codeRetour['reponse']='1Bienvenue Mr '.$nom;
					return new Response(json_encode($codeRetour));
				}
				else{
					$codeRetour['reponse']='1Inscription réussie.';
					return new Response(json_encode($codeRetour));
				}
		   	  }
		 	  else{
				//limite de personne pour cette séance à été atteinte;

				$codeRetour['reponse']='3Limite de personne atteinte.';
				return new Response(json_encode($codeRetour));
		   	  }
		}
	}
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
	 * @Route("/controlleur/setSeance", name="setSeance")
     */ 
	//Cette route sert à modifier la durée de la seance et la limite de personne pour une seance donnée  
	public function setSeance(Request $request){
		
		//récuperation des données depuis l'application android 
		$id = $request->request->get('id');
		$temps = $request->request->get('temps');
		$capacite = $request->request->get('capacite');
		
		//conversion selon les formats attendus dans la BDD 
	   	$capacite = intval($capacite);
	   	$date = new \DateTime();
	   	$michaelBay = explode(":",$temps);
		date_time_set($date,$michaelBay[0],$michaelBay[1]); //on assigne l'heure renvoyée par l'android 
 	    $date = date_format($date, 'Y-m-d H:i:s');
		
		//Màj de la table aua_liste_seance en fonction des données reçues
		$entityManager = $this->getDoctrine()->getManager();
    	$Seance = $entityManager->getRepository(AuaListeSeance::class)->find($id);
		//si la seance n'a pas été trouvée alors on génére un message de retour 
		if (!$Seance) {
			$codeRetour['reponse']='Seance '.$id.' non trouvée.';
    	}
		//sinon on met a jour les donnée reçues et on génére un message de retour 
		else{
			$Seance->setTempsseance(new \DateTime($date));
			$Seance->setLimitepersonnes($capacite);
			$entityManager->flush();
			$codeRetour['reponse']='Paramètres mis à jour.';
		}
		
		//retour de la fonction (message vers l'android)
	  	return new Response(json_encode($codeRetour));
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
	 * @Route("/controlleur/sendSeance", name="sendSeance")
     */ 
	//Cette route renvoi les informations sur une séance à l'android
	public function sendSeance(){
		
		//récupération de la limite de personnes max et du temps de la seance (time uniquement) 
		$rawQuery = "SELECT idSeance,limitePersonnes,CAST(tempsSeance AS TIME(0)) AS tempsSeance FROM aua_liste_seance";
		$entityManager = $this->getDoctrine()->getManager();		
		$querySeance = $entityManager->getConnection()->prepare($rawQuery);
		$querySeance->execute();
		$resultSeance = $querySeance->fetchAll();

		//retour de la fonction (renvoi les informations vers l'android)
	  	return new Response(json_encode($resultSeance));
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	/**
     * @Route("/controlleur/addPersonne", name="addPersonne")
     */ 
	//Cette route permet d'ajouter une personne manuellement (sans badge) et en outrepassant la limite définie 
	public function addPersonne(Request $request){
		
		//récuperation des données depuis l'application android 
		$nom = $request->request->get('nom');
		$prenom = $request->request->get('prenom');

		//attribution d'une photo par défault à l'individu 
		$photo = fopen('../img/autre.png','rb');


		//récuperation du temps de la séance sur la table aua_liste_seance
		$rawQuery = "SELECT tempsSeance FROM aua_liste_seance";
		$entityManager = $this->getDoctrine()->getManager();
		$queryTemps = $entityManager->getConnection()->prepare($rawQuery);
		$queryTemps->execute();
		$resultTemps = $queryTemps->fetchAll();

		//récuperation du dernier numero enregistré dans la table 
		//  /!\ no_exterieur est un varchar donc SELECT MAX n'est pas adapté 
		//		définir un numéro suffisament grand pour résoudre le problème temporairement 
		//		traiter avec les vraies données de la DDN après  
		$rawQuery = "SELECT no_exterieur FROM aua_exterieur_sport WHERE no_exterieur = (SELECT MAX(no_exterieur) FROM aua_exterieur_sport)"; 
		$entityManager =  $this->getDoctrine()->getManager();
		$queryIdentifiant = $entityManager->getConnection()->prepare($rawQuery);
		$queryIdentifiant->execute();
		$resultIdentifiant = $queryIdentifiant->fetchAll();

		//on stock la durée de la séance qu'on a récuperé précedemment dans une variable 
		$tempsSeance = $resultTemps['0']['tempsSeance'];

		//si il y a déjà des gens dans la table on met à la nouvelle personne 
		//le dernier identifiant + 1 (no_exterieur + 1)
		if(isset($resultIdentifiant['0']['no_exterieur'])){
			$numero = $resultIdentifiant['0']['no_exterieur'] + 1;
		}
		//sinon la personne est la première inscrite et on lui attribue le no_exterieur = 10000000
		else{
			$numero = 10000000;
		}

		//ajout de cette personne dans la table aua_exterieur_sport 
		$entityManager1 = $this->getDoctrine()->getManager();
		$ExterieurSport = new AuaExterieurSport();
		$ExterieurSport->setNoExterieur($numero);
		$ExterieurSport->setNom($nom);
		$ExterieurSport->setPrenom($prenom);
		$ExterieurSport->setPhoto($photo);
		$entityManager1->persist($ExterieurSport);
		$entityManager1->flush();

		//ajout de cette personne dans la table aua_presence_seance en IN 
		//heure d'entrée = heure actuelle 
		$entityManager2 = $this->getDoctrine()->getManager();
		$PresenceSeance = new AuaPresenceSeance();
		$PresenceSeance->setIdSeance(1);
		$PresenceSeance->setNoMifareInverse($numero);
		$PresenceSeance->setTemps(new \DateTime());
		$PresenceSeance->setEntreesSorties("IN");
		$entityManager2->persist($PresenceSeance);
		$entityManager2->flush();

		//code de retour vers l'android 
		$codeRetour['reponse']='Personne ajoutée';
		
		//retour de la fonction (message vers l'android)
		return new Response(json_encode($codeRetour));
    }
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
}

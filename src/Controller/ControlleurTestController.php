<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\VuePresence;


class ControlleurTestController extends AbstractController
{
    //-----------------------------------------------------------------------------------------------------------------------------------------------------  route index 
    /**
     * @Route("/controlleur/test", name="controlleur_test")
     */
    public function index()
    {
        return $this->render('controlleur_test/index.html.twig', [
            'controller_name' => 'ControlleurTestController',
        ]);
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------------------  route badgeage 

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

        $queryEtud = "SELECT * FROM aua_etudiant_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryPers = "SELECT * FROM aua_personnel_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryAutre = "SELECT * FROM aua_autre_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

        $statement = $queryNumero->getConnection()->prepare($rawQuery);
        $statement->execute();
        $result = $statement->fetchAll();
        // exemple : print_r($result['0']) --> Array ( [no_individu] => 14003792 [no_mifare_inverse] => 042d87ca253980 ) 

        if (sizeof($result) != 0) {
            return $this->redirectToRoute('vuePresenceUpdate', $result[0]);

        } else {
            // return valeur 0 pour dire que cette carte n'est pas enregistrée dans les tables
            return $this->redirectToRoute('vuePresenceUpdate', array("no_individu" => 0,"no_mifare_inverse" => 0));
        }
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------------------  route vuePresence 
 
    /**
     * @Route("/controlleur/vuePresenceUpdate/{no_individu}/{no_mifare_inverse}", name="vuePresenceUpdate")
     */
    public function vuePresenceUpdate($no_individu,$no_mifare_inverse)
    {
	
	//dans le cas ou le numero de carte n'est pas enregistrée on renvoi un message d'erreur a l'android 
	//et on redirige vers une route "tampon" 
	if($no_individu == 0){
		return $this->redirectToRoute('controlleur_test');		
	}

	//---------------------------------------------------------- Récupérations des données sur 

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
        $rawQuery = "( ". $queryEtud . " ) UNION ( " . $queryPers . " )";

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

	$nombreInscrit = count($vuePresenceData);

	//---------------------------------------------------------- Update de la vue 

	
	//si l'etudiant est present dans la vue alors on le supprime
	//sinon si il y a assez de place on l'y ajoute 


	if(isset($isPresent)){
		echo "fin de la seance";

		//ajout dans aua_presence_seance en OUT
		$date = new \DateTime();
		$date = date_format($date, 'Y-m-d H:i:s') . "\n";
		$ajoutIN = $this->getDoctrine()->getManager();
		$rawQuery = "INSERT INTO aua_presence_seance(idSeance,no_mifare_inverse,temps,entreesSorties) VALUES ('1','$no_mifare_inverse','$date','OUT')";
		$statement = $ajoutIN->getConnection()->prepare($rawQuery);
		$statement->execute();

		//supprimer de la vue 		
		$deletePersonne = $this->getDoctrine()->getManager();
		$RAW_QUERY = "DELETE FROM vue_presence WHERE no_etudiant = '$no_individu' ";
		$statement = $queryPersonne->getConnection()->prepare($RAW_QUERY);
		$statement->execute();
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
	





	
	//route pour definir les informations sur une seance
	//----------------------------------------------------------------------------------------------------------------------------------------------------- route setSeance (finie)
	/**
         * @Route("/controlleur/setSeance/{capacity}/{time}/{id}", name="setSeance")
         */ 

	public function setSeance($capacity,$time,$id){
	
	   $capacity = intval($capacity);
	   $date = new \DateTime();
	   $michaelBay = explode(":",$time);
	   date_time_set($date,$michaelBay[0],$michaelBay[1]);
           $date = date_format($date, 'Y-m-d H:i:s') . "\n";
	
           $setSeance = $this->getDoctrine()->getManager();
	   $RAW_QUERY = "Update aua_liste_seance SET limitePersonnes = '$capacity', tempsSeance = '$date' WHERE idSeance = '$id'";
	   $statement = $setSeance->getConnection()->prepare($RAW_QUERY);
	   $statement->execute();
	   return new Response('');
        }
	
	
	 //----------------------------------------------------------------------------------------------------------------------------------------------------- route listePersonne (en cours)

	//route pour l'affichage de la vue sur l'ecran et le redirect vers l'application
	/**
	 * @Route("/controlleur/listePersonne",name="Liste_etudiant_present")
	 */    

	public function etudiant(){
	   
	   //Récupération des données de la Vue "VuePresence
	   $presence = $this->getDoctrine()->getManager();
	   $rawPresence = "SELECT * FROM vue_presence";

	   $etat = $presence->getConnection()->prepare($rawPresence);
	   $etat->execute();
	   $resultPresence = $etat->fetchAll();  //Stocke dans un tableau
	
           

	   //Récupération de la capacité de la table "AuaPresenceSeance"
	   //la limite de personnes Max 

	   $queryLimitePersonne = $this->getDoctrine()->getManager();
	   $rawQuery = "SELECT * FROM aua_liste_seance";

	   $statement = $queryLimitePersonne->getConnection()->prepare($rawQuery);
	   $statement->execute();
	   $resultLimitePersonne = $statement->fetchAll(); //Stocke dans un tableau
	
           $dateActuelle = new \DateTime();
	   $presents = array();

	   //Creer un nouveau tableau vue_presence où je vais restocker avec le temps de la séance d'un étudiant
	   //Calcul du temps de la séance de l'étudiant

	   foreach($resultPresence as $result){
		$tempsResult = $result['temps'];
		$dateInscrit = new \DateTime($tempsResult);
		$intervalle = date_diff($dateActuelle,$dateInscrit);
		$value = $intervalle->format('%H:%I');
		$result['duree'] = $value;
		array_push($presents,$result);
	   }

		echo json_encode($presents);

	   return new Response('');
	  }


	//----------------------------------------------------------------------------------------------------------------------------------------------------- route addPersonne (finie)
	//route pour ajouter une personne manuellement 
	/**
         * @Route("/controlleur/addPersonne/{nom}", name="addPersonne")
         */ 

	public function addPersonne($nom){

		//query tempsSeance 
		$queryTemps = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT tempsSeance FROM aua_liste_seance";
		$statement = $queryTemps->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultTemps = $statement->fetchAll();

		foreach($resultTemps as $resultT){
			$tempsSeance = $resultT['tempsSeance'];
		}
		
		
		//query last identifiant de aua_exterieur_sport
		$queryIdentifiant =  $this->getDoctrine()->getManager();
		$rawQuery = "SELECT no_exterieur FROM aua_exterieur_sport WHERE no_exterieur = (SELECT MAX(no_exterieur) FROM aua_exterieur_sport)"; 
		$statement = $queryIdentifiant->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultIdentifiant = $statement->fetchAll();
		
		foreach($resultIdentifiant as $result){
			$numero = $result['no_exterieur'];
		}

		
		//si il n'y a encore personne dans la table on met a la personne l'identifiant 1 
		if(empty($result)){
			$numero = 1;
			$queryLimiteTemps = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom) VALUES ('$numero','$nom','prenom1')";
			$statement = $queryLimiteTemps->getConnection()->prepare($rawQuery);
			$statement->execute();	
		}
		//sinon on lui met le dernier identifiant + 1
		else{
			foreach($resultIdentifiant as $result){$numero = $result['no_exterieur'];}
			$numero += 1;
			$queryLimiteTemps = $this->getDoctrine()->getManager();
			$rawQuery = "INSERT INTO aua_exterieur_sport(no_exterieur,nom,prenom) VALUES ('$numero','$nom','prenom1')";
			$statement = $queryLimiteTemps->getConnection()->prepare($rawQuery);
			$statement->execute();
		}

		
		//ajouter dans la vue peut importe la limite 		
		$entityManager = $this->getDoctrine()->getManager();
		$Vue = new VuePresence();
		$Vue->setIdSeance(1);
		$Vue->setNom($nom);
		$Vue->setPrenom('prenom1');
		$Vue->setTemps(new \DateTime());
		$Vue->setNoEtudiant($numero);
		$Vue->setTempsSeance(new \DateTime($tempsSeance));
		$entityManager->persist($Vue);
		$entityManager->flush();
		

		return new Response($nom);
        }
}

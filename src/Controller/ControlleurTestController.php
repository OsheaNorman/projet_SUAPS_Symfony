<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\VuePresence;


class ControlleurTestController extends AbstractController
{
	//------------------------------------------------------------------------------------------------------------------------------  route présence
	//Méthode permettant de récupérer les données pour l'affichage écran

	/**
    * @Route("/listePersonne",name="Liste_etudiant_present")
    */

    public function etudiant()
    {
		//Récupération des données de la Vue "VuePresence"
        //$repo = $this->getDoctrine()->getRepository(VuePresence::class);
		//$presents = $repo->findAll();
		$presence = $this->getDoctrine()->getManager();
		$rawPresence = "SELECT * FROM vue_presence";

		$etat = $presence->getConnection()->prepare($rawPresence);
		$etat->execute();
		$resultPresence = $etat->fetchAll(); //Stocke dans un tableau

		//Récupération de la capacité de la table "AuaPresenceSeance"
		//la limite de personnes Max 
		$queryLimitePersonne = $this->getDoctrine()->getManager();
		$rawQuery = "SELECT * FROM aua_liste_seance";

		$statement = $queryLimitePersonne->getConnection()->prepare($rawQuery);
		$statement->execute();
		$resultLimitePersonne = $statement->fetchAll(); //Stocke dans un tableau

		//Date Actuelle
		$dateActuelle = new \DateTime();
		//$dateActuelle = date_format($dateActuelle,'H:i');

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

        return $this->render('controlleur_test/listeEtudiantPresent.html.twig', [
            'liste_presence' => 'Liste des étudiants présents',
			'presents' => $presents,
			'dateActuelle' => $dateActuelle,
			'resultLimitePersonnes' => $resultLimitePersonne
        ]);
	}

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
	

	//la limite de personnes Max 
	$queryLimitePersonne = $this->getDoctrine()->getManager();
	$rawQuery = "SELECT limitePersonnes FROM aua_liste_seance";

	$statement = $queryLimitePersonne->getConnection()->prepare($rawQuery);
        $statement->execute();
        $resultLimitePersonne = $statement->fetchAll();

	
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


	foreach($resultLimitePersonne as $result){
		$limite = $result['limitePersonnes'];
	}

	$nombreInscrit = count($vuePresenceData);

	//---------------------------------------------------------- Update de la vue 

	
	//si l'etudiant est present dans la vue alors on le supprime
	//sinon si il y a assez de place on l'y ajoute 


	if(isset($isPresent)){
		echo "fin de la seance <br>";

		
		//ajout dans aua_presence_seance en OUT
		$ajoutIN = $this->getDoctrine()->getManager();
		$rawQuery = 
		

		//supprimer de la vue 		
		$deletePersonne = $this->getDoctrine()->getManager();
		$RAW_QUERY = "DELETE FROM vue_presence WHERE no_etudiant = '$no_individu' ";
		$statement = $queryPersonne->getConnection()->prepare($RAW_QUERY);
		$statement->execute();

		
	}
	else{
	   if($nombreInscrit < $limite){
		echo "debut de la seance <br>";

		//ajout dans aua_presence_seance en IN
		

		//ajouter dans la vue 		
		$entityManager = $this->getDoctrine()->getManager();
		$Vue = new VuePresence();
		$Vue->setIdSeance(1);
		$Vue->setNom($nom);
		$Vue->setPrenom($prenom);
		$Vue->setTemps(new \DateTime());
		$Vue->setNoEtudiant($no_individu);
		$Vue->setTempsSeance(new \DateTime());
		$entityManager->persist($Vue);
		$entityManager->flush();
	   }
	   else{
		echo "la limite de personne pour cette seance a été atteinte <br>";

		
	   }
	}

	//---------------------------------------------------------- Redirection
	return new Response('');
	//return $this->redirectToRoute('nomRoute', array('R1' => $nombreInscrit,'R2' =>$limite));
        //return $this->redirectToRoute('api_cartes_get_collection');
    }
	





	
	//route pour definir les informations sur une seance
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
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
	






	// a remplacer apres avec la partie de Mate 
        //-----------------------------------------------------------------------------------------------------------------------------------------------------
	/**
         * @Route("/controlleur/listePersonne", name="listePersonne")
         */ 
	public function listePersonne(){
		//recuperation des données de la table VuePresence 
	        $vuePresenceData = $this->getDoctrine()
               ->getRepository(VuePresence::class)
               ->createQueryBuilder('v')
               ->select('v')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

		var_dump($vuePresenceData);
	   
		//echo json_encode($vuePresenceData);
		return new Response('');
        }





	




	// route pour ajouter quelqu'un manuellement 
	//-----------------------------------------------------------------------------------------------------------------------------------------------------
	/**
         * @Route("/controlleur/addPersonne", name="addPersonne")
         */ 

	public function addPersonne(){

	   
        }


	//-----------------------------------------------------------------------------------------------------------------------------------------------------











	//route test timeView
	/**
         * @Route("/c", name="timeView")
         */
        public function timeView(){
	
	//recuperation des données de la table VuePresence 
	$vuePresenceData = $this->getDoctrine()
               ->getRepository(VuePresence::class)
               ->createQueryBuilder('v')
               ->select('v')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

	//var_dump($vuePresenceData);
	foreach($vuePresenceData as $value){
           foreach($value as $val => $v)
		if (is_a($v, 'DateTime')){
		 $test =  date_format($v,'Y-m-d H:i:s');
		
		echo"
		 <script type=\"text/javascript\">

		var date = new Date(\"$test\");
		

		alert(date);
          
		 </script>";  
		}
		else{
		  //echo $v;
		}
	}
	
	//affichage de l'heure courante a deplacer dans la route de la vue 
	echo"
	<div id=\"div_horloge\"></div>
	 
	<script type=\"text/javascript\">
	window.onload=function() {
	  horloge('div_horloge');
	};
	 
	function horloge(el) {
	  if(typeof el==\"string\") { el = document.getElementById(el); }
	  function actualiser() {
	    var date = new Date();
	    var str = date.getHours();
	    str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
	    str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
	    el.innerHTML = str;
	  }
	  actualiser();
	  setInterval(actualiser,1000);
	}
	</script>";

	return new Response('');
	}
}


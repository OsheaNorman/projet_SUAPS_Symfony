<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\VuePresence;
use App\Entity\AuaListeSeance;
use Doctrine\DBAL\Connection;



class ControlleurTestController extends AbstractController
{
	/**
    *
    * @var Connection
    */
    private $connection;

    public function __construct(Connection $dbalConnection)  {
        $this->connection = $dbalConnection;    
    }

    /**
     * @Route("/controlleur/test", name="controlleur_test")
     */
    public function index()
    {
        return $this->render('controlleur_test/index.html.twig', [
            'controller_name' => 'ControlleurTestController',
        ]);
    }


    /**
     * @Route("/cont/{no_etudiant}", name="Test redirection vue")
     */
    public function number($no_etudiant)
    {

	//Faire la vérification dans la base avec doctrine
        //Si, par exemple, assez de place renvoyer ok
        //Sinon revoyer non
	//récuperation de toutes les données de vue_presence afin d'en extraire no_etudiant 
        //recuperation des données de la table VuePresence
	//$repository = $this->getDoctrine()->getRepository(VuePresence::class)->findAll();



	//---------------------------------------------------------- Récupérations des données 

	//recuperation des données de la table VuePresence 
	$VuePresenceData = $this->getDoctrine()
               ->getRepository(VuePresence::class)
               ->createQueryBuilder('v')
               ->select('v')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

	
	//recuperation du nombre de personnes max d'une seance 
	$limitePersonne = $this->getDoctrine()
               ->getRepository(AuaListeSeance::class)
               ->createQueryBuilder('l')
               ->select('l.limitepersonnes')
               ->getQuery()
               ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
 	
	

	/*
	$em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT * FROM aua_etudiant';
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $result = $statement->fetchAll();

	var_dump($result);
	*/
	


	
	//---------------------------------------------------------- Traitement des données 
	
	//verification si le numero etudiant est deja present dans la vue
	foreach($VuePresenceData as $repository){
		foreach($repository as $rep => $values){
			if(is_int($values) && $values == $no_etudiant)
				$isPresent = true;
		}
	}

	//nombre de personnes inscrites/max
	foreach($limitePersonne as $limite){
		foreach($limite as $lim => $val)
			$limite = $val;	
	}
	$nombreInscrit = count($VuePresenceData);


	//ajout d'un etudiant dans vuePresence si les conditions sont remplies 
	if(isset($isPresent) || $nombreInscrit >= $limite){
		echo "vous ne pouvez pas vous inscrire <br>";
	}
	else{
		echo "inscription en cours <br>" ; 
		//insertion VuePresence
		$entityManager = $this->getDoctrine()->getManager();
		$product = new VuePresence();
		$product->setNom('Key');
		$product->setPrenom('yolo');
		$product->setTemps(new \DateTime());
		$product->setNoEtudiant($no_etudiant);
		$product->setTempsSeance(new \DateTime());
		$entityManager->persist($product);
		$entityManager->flush();
	}
	
	//test pour l'android 
	$test = json_encode($VuePresenceData);
	//echo $test;

	//---------------------------------------------------------- Redirection 


        //return $this->redirectToRoute('nomRoute', array('R1' => $nombreInscrit,'R2' =>$limite));
        return new Response('fin');
        //return $this->redirectToRoute('api_cartes_get_collection');

    }
	

     //redirection du nombre d'etudiant et de la limite de personne vers la route de la vue 
     /**
     * @Route("/route/{R1}/{R2}", name="nomRoute")
     */
     public function num($R1,$R2){

	echo $R1."/".$R2."<br>";
	return new Response('fin');
	
     }

}


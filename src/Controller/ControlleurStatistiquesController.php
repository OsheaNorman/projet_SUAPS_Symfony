<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\AuaPresenceSeance;

class ControlleurStatistiquesController extends AbstractController
{
    /**
     * @Route("/controlleur/statistiques/badgeages", name="statistiques_badgeages")
     */
    public function index() {
        
        return $this->render('controlleur_statistiques/index.html.twig', [
            'resultat' => "",
            'nb_badgeages' => "",
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}", name="badgeages_jours")
     */
    public function badgeagesJour($date)
    {
        // récupération de la date sans l'heure
        $date_format = $date . "%";
        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps LIKE '$date_format'";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultats = $statement->fetchAll();

        //var_dump($resultats);
        //return new Response("Nombre de badgeage le $date = " . count($resultats));
        return $this->render('controlleur_statistiques/index.html.twig', [
            'nb_badgeages' => count($resultats),
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/tranche/{heure_debut}/{heure_fin}", name="badgeages_tranche_horaire")
     */
    public function badgeagesTranchesHoraires($heure_debut, $heure_fin) {

        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps BETWEEN '$heure_debut' AND '$heure_fin'";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultats = $statement->fetchAll();

        var_dump($resultats);
        return new Response("");
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/personne/{nom}", name="badgeages_nom")
     */
    public function badgeagesPersonne($nom) {
        $queryNumero = $this->getDoctrine()->getManager();

        // récupértion du numéro de la carte

        $queryEtud = "SELECT no_etudiant FROM aua_etudiant WHERE nom_usuel = '$nom'";
        $queryPers = "SELECT no_individu FROM aua_personnel WHERE nom_usuel = '$nom'";

        $queryNum = "( ". $queryEtud . " ) UNION ( " . $queryPers . " )";

        $statement = $queryNumero->getConnection()->prepare($queryNum);
        $statement->execute();
        $resultat = $statement->fetchAll(); // le resultat c'est un tableau contenant au maximum un élement;

        // récupération du no_mifare_inverse
        if (count($resultat) > 1) {
            // retour d'erreur
        } else {
            $r = $resultat[count($resultat) - 1];
            if ($r["no_etudiant"]) {
                $no_individu = $r["no_etudiant"];
                //$q = "SELECT no_mifare_inverse FROM aua_etudiant_unicampus WHERE ";
            } else if ($r["no_individu"]){
                $no_individu = $r["no_individu"];
            } else {
                // rien pour l'instant
            }
            
            $qEtud = "SELECT no_mifare_inverse FROM aua_etudiant_unicampus WHERE no_individu = '$no_individu'";
            $qPers = "SELECT no_mifare_inverse FROM aua_personnel_unicampus WHERE no_individu = '$no_individu'";

            $q_no_mifare = "( ". $qEtud . " ) UNION ( " . $qPers . " )";

            $statement = $queryNumero->getConnection()->prepare($q_no_mifare);
            $statement->execute();
            $resultat = $statement->fetchAll();

            $val_no_mifare = $resultat[0]["no_mifare_inverse"];

            $q_nb_badgeages= "SELECT * FROM aua_presence_seance WHERE no_mifare_inverse = '$val_no_mifare'";

            $statement = $queryNumero->getConnection()->prepare($q_nb_badgeages);
            $statement->execute();
            $resultat = $statement->fetchAll();
        }

        var_dump($resultat);
        return new Response("");
    }
}

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
     * 
     * Point d'entrée pour tout ce qui concerne les statistiques
     */
    public function index() {
        
        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages_par_jour' => 0,
            'count_nb_badgeages_par_nom' => 0,
            'nb_badgeages_par_nom' => [],
            'count_nb_badgeages_par_tranche' => 0,
            'nb_badgeages_par_tranche' => [],
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}", name="badgeages_jours")
     */
    public function badgeagesJour($date)
    {
        // date du type : "YYYY-MM-DD"
        // récupération de la date sans l'heure
        $date_format = $date . "%";
        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps LIKE '$date_format'";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultats = $statement->fetchAll();

        //var_dump($resultats);
        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages_par_jour' => count($resultats),
            'count_nb_badgeages_par_nom' => 0,
            'nb_badgeages_par_nom' => [],
            'count_nb_badgeages_par_tranche' => 0,
            'nb_badgeages_par_tranche' => [],
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/tranche/{heure_debut}/{heure_fin}", name="badgeages_tranche_horaire")
     */
    public function badgeagesTranchesHoraires($heure_debut, $heure_fin) {

        // heure_debut et heure_fin du type : "AAAA-MM-DD hh:mm:ss"

        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps BETWEEN '$heure_debut' AND '$heure_fin'";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        //var_dump($resultat);
        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages_par_jour' => 0,
            'count_nb_badgeages_par_nom' => 0,
            'nb_badgeages_par_nom' => [],
            'count_nb_badgeages_par_tranche' => count($resultat),
            'nb_badgeages_par_tranche' => $resultat,
        ]);
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
        } else if (count($resultat) == 1){
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
        } else {
            $resultat = [];
        }

        //var_dump($resultat);
        //var_dump(count($resultat));
        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages_par_jour' => 0,
            'count_nb_badgeages_par_nom' => count($resultat),
            'nb_badgeages_par_nom' => $resultat,
            'count_nb_badgeages_par_tranche' => 0,
            'nb_badgeages_par_tranche' => [],
        ]);
    }
}

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
        
        $date_du_jour = new \DateTime();
        $date_du_jour_str = $date_du_jour->format("Y-m-d");
        var_dump($date_du_jour_str);
        return $this->redirectToRoute("badgeages_jours", array("date" => $date_du_jour_str));
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}", name="badgeages_jours")
     */
    public function badgeagesJour($date)
    {
        // $date du type : "YYYY-MM-DD"

        // récupération de la date sans l'heure
        $a = array(); // Le résultat final à retourner

        $plage_min = "30";

        $date_format = $date . "%";
        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps LIKE '$date_format' AND entreesSorties LIKE 'IN' ORDER BY temps";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultats = $statement->fetchAll();

        if (count($resultats) != 0) {
            $debut_seance = new \DateTime($resultats[0]["temps"]);
            $fin_seance = new \DateTime($resultats[count($resultats) - 1]["temps"]);

            $debut = date_format($debut_seance, "H:i");
            $fin = date_format($fin_seance, "H:i");

            $debut_heure = preg_split("/[:]/",$debut)[0];
            $fin_heure = preg_split("/[:]/",$fin)[0] + 1;

            $debut_seance = $debut_seance->setTime($debut_heure, 0);
            $fin_seance = $fin_seance->setTime($fin_heure, 0);

            while ($debut_seance < $fin_seance) {
                $resultat_creneau = array();

                $start_str = $debut_seance->format("Y-m-d H:i:s");

                $h_start = $debut_seance->format("H");
                $min_start = $debut_seance->format("i");

                $end = $debut_seance->add(new \DateInterval("P0Y0M0DT0H" . $plage_min . "M0S"));
                $end_str = $end->format("Y-m-d H:i:s");

                $h_end = $end->format("H");
                $min_end = $end->format("i");

                $resultat_creneau["h_debut"] = $h_start;
                $resultat_creneau["min_debut"] = $min_start;
                $resultat_creneau["h_fin"] = $h_end;
                $resultat_creneau["min_fin"] = $min_end;
                $resultat_creneau["array_result"] = $this->badgeagesTranchesHoraires($start_str, $end_str);

                array_push($a, $resultat_creneau);

                $debut_heure += 1;
                $debut_seance = $end;
            }            
        }
        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'plage_min' => $plage_min,
            'date' => $date,
            'resultat_creneau' => $a,
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/tranche/{heure_debut}/{heure_fin}", name="badgeages_tranche_horaire")
     */
    public function badgeagesTranchesHoraires($heure_debut, $heure_fin) {

        // $heure_debut et $heure_fin du type : "AAAA-MM-DD hh:mm:ss"

        $queryNumero = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE entreesSorties LIKE 'IN' AND temps BETWEEN '$heure_debut' AND '$heure_fin'";

        $statement = $queryNumero->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
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

        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages_par_jour' => 0,
            'count_nb_badgeages_par_nom' => count($resultat),
            'nb_badgeages_par_nom' => $resultat,
            'count_nb_badgeages_par_tranche' => 0,
            'nb_badgeages_par_tranche' => [],
        ]);
    }
}

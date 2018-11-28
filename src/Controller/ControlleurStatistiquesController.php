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
     * Par défaut cette fonction redirige vers les statistiques du jours courant
     */
    public function index() {
        
        $date_du_jour = new \DateTime();
        $date_du_jour_str = $date_du_jour->format("Y-m-d");
        return $this->redirectToRoute("badgeages_jours", array("date" => $date_du_jour_str));
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}", name="badgeages_jours")
     */
    public function badgeagesJour($date)
    {
        // $date du type : "YYYY-MM-DD"

        // récupération de la date sans l'heure
        $data_array = array(); // Le résultat final à retourner

        $plage_min = "30";

        $date_format = $date . "%";
        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps LIKE '$date_format' AND entreesSorties LIKE 'IN' ORDER BY temps";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $badge_in = $statement->fetchAll();

        if (count($badge_in) != 0) {
            $debut_seance = new \DateTime($badge_in[0]["temps"]);
            $fin_seance = new \DateTime($badge_in[count($badge_in) - 1]["temps"]);

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

                array_push($data_array, $resultat_creneau);

                $debut_heure += 1;
                $debut_seance = $end;
            }            
        }
        
        $temps_seance = $this->tempsSeance($date);

        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages' => count($badge_in),
            'plage_min' => $plage_min,
            'date' => $date,
            'resultat_creneau' => $data_array,
            'temps_seance' => $temps_seance
        ]);
    }

    public function badgeagesTranchesHoraires($heure_debut, $heure_fin) {

        // $heure_debut et $heure_fin du type : "AAAA-MM-DD hh:mm:ss"

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE entreesSorties LIKE 'IN' AND temps BETWEEN '$heure_debut' AND '$heure_fin'";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
    }

    public function tempsSeance($date) {
        $date_format = $date . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT DISTINCT no_mifare_inverse FROM aua_presence_seance WHERE temps LIKE '$date_format'"; // toutes les personnes présentes pour ce jour

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll(); // les personnes présentes

        $temps_seance = array(); // en minutes - tableau à retourner

        if (count($resultat) != 0) {

            foreach ($resultat as $value) { // Obtenir les IN et les OUT d'une seule personne
                $temps_in = array();
                $temps_out = array();

                $no_mifare_inverse = $value["no_mifare_inverse"];

                // IN
                $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'IN' AND temps LIKE '$date_format' ORDER BY temps";
                $statement = $manager->getConnection()->prepare($query);
                $statement->execute();
                $tab_in = $statement->fetchAll();

                //var_dump($tab_in);

                foreach ($tab_in as $r) {
                    array_push($temps_in, $r["temps"]);
                }

                // OUT
                $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'OUT' AND temps LIKE '$date_format' ORDER BY temps";
                $statement = $manager->getConnection()->prepare($query);
                $statement->execute();
                $tab_out = $statement->fetchAll();

                foreach ($tab_out as $r) {
                    array_push($temps_out, $r["temps"]);
                }

                $min = min(count($temps_in), count($temps_out));

                
                for ($i = 0; $i < $min ; $i++) {

                    $in = new \DateTime($temps_in[$i]);
                    $out = new \DateTime($temps_out[$i]);

                    $diff = $out->diff($in)->h * 60;
                    $diff += $out->diff($in)->i;
                    $diff += $out->diff($in)->s / 60;
                    $diff = round($diff, 2); // arrondir à 2 chiffres après la virgule

                    array_push($temps_seance, $diff);
                }
            }
        }
        return $temps_seance;
    }
}

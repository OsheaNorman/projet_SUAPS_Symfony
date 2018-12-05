<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\AuaPresenceSeance;

class ControlleurStatistiquesController extends AbstractController
{
    /**
     * @Route("/controlleur/statistiques/badgeages/{plage}", name="statistiques_badgeages")
     * 
     * Point d'entrée pour tout ce qui concerne les statistiques
     * Par défaut cette fonction redirige vers les statistiques du jours courant
     */
    public function index($plage) {
        
        $date_du_jour = new \DateTime();
        $date_du_jour_str = $date_du_jour->format("Y-m-d");
        return $this->redirectToRoute("badgeages_jours", array("date" => $date_du_jour_str, "plage" => $plage));
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}/{plage}", name="badgeages_jours")
     */
    public function badgeagesJour($date, $plage)
    {
        // $date du type : "YYYY-MM-DD"

        // récupération de la date sans l'heure
        $data_array = array(); // Le résultat final à retourner

        $plage_min = $plage;

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
        $csv_data = $this->csvData($date);

        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages' => count($badge_in),
            'plage_min' => $plage_min,
            'date' => $date,
            'resultat_creneau' => $data_array,
            'temps_seance' => $temps_seance,
            'csv_data' => $csv_data
        ]);
    }

    public function badgeagesTranchesHoraires($heure_debut, $heure_fin) {

        // $heure_debut et $heure_fin du type : "AAAA-MM-DD hh:mm:ss"
        $hommes = 0;
        $femmes = 0;

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE entreesSorties LIKE 'IN' AND temps BETWEEN '$heure_debut' AND '$heure_fin'";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        for ($i = 0; $i < count($resultat); $i++) {
            $no_individu = $this->getNoIndividu($resultat[$i]["no_mifare_inverse"]);
            $sexe = $this->getSexe($no_individu);
            if ($this->isMan($sexe)) {
                $hommes += 1;
            } else if ($this->isWoman($sexe)) {
                $femmes += 1;
            }
        }

        $compteur = array();
        $compteur["hommes"] = $hommes;
        $compteur["femmes"] = $femmes;

        return $compteur;
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

            foreach ($resultat as $value) { // Obtenir les IN et les OUT d'une seule personne, son sexe et son numéro no_individu
                $temps_in = array();
                $temps_out = array();

                $profil = array(); // contiendra le sexe et le no_individu

                $no_mifare_inverse = $value["no_mifare_inverse"];
                $no_individu = $this->getNoIndividu($no_mifare_inverse);
                $profil["no_individu"] = $no_individu;
                $profil["sexe"] = $this->getSexe($no_individu);

                // IN
                $tab_in = $this->getHeureIN($no_mifare_inverse, $date);

                foreach ($tab_in as $r) {
                    array_push($temps_in, $r["temps"]);
                }

                // OUT
                $tab_out = $this->getHeureOUT($no_mifare_inverse, $date);

                foreach ($tab_out as $r) {
                    array_push($temps_out, $r["temps"]);
                }

                $min = min(count($temps_in), count($temps_out));

                for ($i = 0; $i < $min ; $i++) {
                    $duree = $this->dureeSeance($temps_in[$i], $temps_out[$i]);
                    $profil["duree"] = $duree; // new add
                    //array_push($temps_seance, $duree);
                    array_push($temps_seance, $profil);
                }
            }
        }

        return $temps_seance;
    }

    /**
     * @Route("/no_individu/{no_mifare_inverse}", name="no_individu")
     * Un no_mifare inverse correspond à un no_individu. Un et un seul
     */
    public function getNoIndividu($no_mifare_inverse) {
        $manager = $this->getDoctrine()->getManager();
        $queryEtud = "SELECT no_individu FROM aua_etudiant_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryPers = "SELECT no_individu FROM aua_personnel_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $queryAutre = "SELECT no_individu FROM aua_autre_unicampus WHERE no_mifare_inverse = '$no_mifare_inverse'";
        $query = "( ". $queryEtud . " ) UNION ( " . $queryPers . " ) UNION ( " . $queryAutre . " )";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        if (count($resultat) == 0) {
            return "";
        } else if(count($resultat) > 1) {
            return "Numéro qui n'est pas unique !";
        } else {
            return $resultat[0]["no_individu"];
        }
    }

    /**
     * @Route("/sexe/{no_individu}", name="sexe")
     */
    public function getSexe($no_individu) {
        $manager = $this->getDoctrine()->getManager();
        $querySexeEtud = "SELECT sexe FROM aua_etudiant WHERE no_etudiant = '$no_individu'";
        $querySexePers = "SELECT c_civilite as sexe FROM aua_personnel WHERE no_individu = '$no_individu'";
        $query = "( ". $querySexeEtud . " ) UNION ( " . $querySexePers . " )";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        if (count($resultat) == 0) {
            return "";
        } else if (count($resultat) > 1) {
            return "Numéro qui n'est pas unique !";
        } else {
            return $resultat[0]["sexe"];
        }
    }

    /**
     * @Route("/entrees/{no_mifare_inverse}/{date}", name="entrees")
     * format de la date : YYYY-MM-DD
     * retourne un tableau des heures d'arrivées pour une personne
     */
    public function getHeureIN($no_mifare_inverse, $date) {
        $date_format = $date . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'IN' AND temps LIKE '$date_format' ORDER BY temps";
        
        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
    }

    /**
     * @Route("/sorties/{no_mifare_inverse}/{date}", name="sorties")
     * format de la date : YYYY-MM-DD
     * retourne un tableau des heures de sorties pour une personne
     */
    public function getHeureOUT($no_mifare_inverse, $date) {
        $date_format = $date . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'OUT' AND temps LIKE '$date_format' ORDER BY temps";
        
        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
    }

    /**
     * format temps_in et temps_out : YYYY-MM-DD hh:mm:ss
     * retourne la durée d'une séance pour une personne en minutes
     */
    public function dureeSeance($temps_in, $temps_out) {
        $in = new \DateTime($temps_in);
        $out = new \DateTime($temps_out);

        $diff = $out->diff($in)->h * 60;
        $diff += $out->diff($in)->i;
        //$diff += $out->diff($in)->s / 60;

        $diff = round($diff, 2); // arrondir à 2 chiffres après la virgule

        return $diff;
    }

    public function isMan($sexe) {
        if ($sexe == 'M' || $sexe == 'm.') {
            return true;
        }
        return false;
    }

    public function isWoman($sexe) {
        if ($sexe == "F" || $sexe == "mme") {
            return true;
        }
        return false;
    }

    /**
     * retourne l'ensemble des données qui seront exportées au format csv
     */
    public function csvData($date) {
        $data_result = array();

        $date_format = $date . "%";
        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT DISTINCT no_mifare_inverse FROM aua_presence_seance WHERE temps LIKE '$date_format' AND entreesSorties LIKE 'IN' ORDER BY temps";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $badge_in = $statement->fetchAll();

        for ($i = 0; $i < count($badge_in); $i++) {
            $no_mifare_inverse = $badge_in[$i]["no_mifare_inverse"];
            $no_individu = $no_individu = $this->getNoIndividu($no_mifare_inverse);

            if ($this->isWoman($this->getSexe($no_individu))) {
                $sexe = "F";
            } else if ($this->isMan($this->getSexe($no_individu))) {
                $sexe = "M";
            } else {
                $sexe = "";
            }

            $entrees = $this->getHeureIN($no_mifare_inverse, $date);
            $sorties = $this->getHeureOUT($no_mifare_inverse, $date);

            for ($j = 0; $j < count($entrees); $j++) {
                $row = array();

                $row["heure_entree"] = $entrees[$j]["temps"];

                if (array_key_exists($j, $sorties)) {
                    $row["duree"] = $this->dureeSeance($entrees[$j]["temps"], $sorties[$j]["temps"]);
                    $row["heure_sortie"] = $sorties[$j]["temps"];
                } else {
                    $row["heure_sortie"] = "";
                    $row["duree"] = "";
                }
                $row["no_individu"] = $no_individu;
                $row["sexe"] = $sexe;
                
                array_push($data_result, $row);
            }
        }
        return $data_result;
    }
}

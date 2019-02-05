<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\AuaPresenceSeance;

class ControlleurStatistiquesController extends AbstractController
{
    /**
     * @Route("/controlleur/statistiques/badgeages/minute", name="statistiques_badgeages_heure")
     * 
     * Point d'entrée pour tout ce qui concerne les statistiques
     * Par défaut cette fonction redirige vers les statistiques du jours courant
     */
    public function index() {
        
        $date_du_jour = new \DateTime();
        $date_du_jour_str = $date_du_jour->format("Y-m-d");
        return $this->redirectToRoute("badgeages_heures", array("date" => $date_du_jour_str,"date2" => $date_du_jour_str, "plage" => 30));
    }

   /**
     * @Route("/controlleur/statistiques/badgeages/jour", name="statistiques_badgeages_jours")
     * 
     * Point d'entrée pour tout ce qui concerne les statistiques
     * Par défaut cette fonction redirige vers les statistiques du jours courant
     */
    public function index_jours() {
        
        $date_du_jour = new \DateTime();
        $date_du_jour_str = $date_du_jour->format("Y-m-d");
        return $this->redirectToRoute("badgeages_jours", array("date" => $date_du_jour_str,"date2" => $date_du_jour_str, "plage" => 30));
    }
    /**
     * @Route("/controlleur/statistiques/badgeages/minute/{date}/{date2}/{plage}", name="badgeages_heures")
     * Fonction qui va retourner les données sur la page web statistiques.html.twig 
     */
    public function badgeagesHeure($date,$date2, $plage)
    {
        // $date du type : "YYYY-MM-DD"
        // $plage est en minutes

        $data_array = array(); // Le résultat final à retourner

        $plage_min = $plage;

        $date_format = $date . " 00:00:00";
        $date_format2 = $date2 . " 23:59:59";
        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps between '$date_format' AND '$date_format2' AND entreesSorties LIKE 'IN' ORDER BY temps";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $badge_in = $statement->fetchAll(); // tous les badgeages d'entrée pour les dates choisies

        // s'il n'y a pas eu de badgeages, pas besoin de faire des traitements approfondis
        // sinon, on subdivise la journée en plusieurs plages et sur chaque plage, on 
        // calcule le nombre d'hommes et de femmes qui étaient présents.
        if (count($badge_in) != 0) {
            $debut_seance = new \DateTime($badge_in[0]["temps"]);
            $fin_seance = new \DateTime($badge_in[count($badge_in) - 1]["temps"]);

            $debut = date_format($debut_seance, "H:i");
            $fin = date_format($fin_seance, "H:i");

            // Calcul de la 1ère et dernière heure de badgeage dans la journée
            // Par exemple si la première personne a badgé à 10h20 ou 10h34 etc. la première heure sera 10h.
            // C'est à partir de cette heure là que nous commençerons à subdiviser la journée  en plusieurs plages.
            // Pour la dernière heure, si la dernière personne a badgé à 18h01 par exemple, la dernière heure sera 19h.
            $debut_mois = preg_split("/[:]/",$debut)[0];
            $fin_jour = preg_split("/[:]/",$fin)[0] + 1;

            $debut_seance = $debut_seance->setTime($debut_mois, 0);
            $fin_seance = $fin_seance->setTime($fin_jour, 0);

            // Subdivision de la journée en plages horaires + nombre d'hommes et de femmes présents sur chaque tranche
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

                $debut_mois += 1;
                $debut_seance = $end;
            }
        }

        $temps_seance = $this->tempsSeance($date,$date2);
        $csv_data = $this->csvData($date,$date2);

        return $this->render('controlleur_statistiques/statistiques.html.twig', [
            'nb_badgeages' => count($badge_in),
            'plage_min' => $plage_min,
            'date' => $date,
            'date2' => $date2,
            'resultat_creneau' => $data_array,
            'temps_seance' => $temps_seance,
            'csv_data' => $csv_data
        ]);
    }

    /**
     * @Route("/controlleur/statistiques/badgeages/jour/{date}/{date2}/{plage}", name="badgeages_jours")
     * Fonction qui va retourner les données sur la page web statistiques.html.twig 
     */
public function badgeagesJour($date,$date2, $plage)
    {
        // $date du type : "YYYY-MM-DD"
        // $plage est en minutes

        $data_array = array(); // Le résultat final à retourner

        //$plage_min = $plage;

        $date_format = $date. " 00:00:00";
        $date_format2 = $date2. " 23:59:59";
        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT * FROM aua_presence_seance WHERE temps between '$date_format' AND '$date_format2' AND entreesSorties LIKE 'IN' ORDER BY temps";

        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $badge_in = $statement->fetchAll(); // tous les badgeages d'entrée pour les dates choisies

        // s'il n'y a pas eu de badgeages, pas besoin de faire des traitements approfondis
        // sinon, on subdivise la journée en plusieurs plages et sur chaque plage, on 
        // calcule le nombre d'hommes et de femmes qui étaient présents.
        if (count($badge_in) != 0) {
            $debut_seance = new \DateTime($badge_in[0]["temps"]);
            $fin_seance = new \DateTime($badge_in[count($badge_in) - 1]["temps"]);

            $debut = date_format($debut_seance, "n:d");
            $fin = date_format($fin_seance, "n:d");

            // Calcul de la 1ère et dernière heure de badgeage dans la journée
            // Par exemple si la première personne a badgé à 10h20 ou 10h34 etc. la première heure sera 10h.
            // C'est à partir de cette heure là que nous commençerons à subdiviser la journée  en plusieurs plages.
            // Pour la dernière heure, si la dernière personne a badgé à 18h01 par exemple, la dernière heure sera 19h.
            $debut_mois = preg_split("/[:]/",$debut)[0];
            $fin_jour = preg_split("/[:]/",$fin)[0] + 1;

            $debut_seance = $debut_seance->setTime($debut_mois, 0);
            $fin_seance = $fin_seance->setTime($fin_jour, 0);

            // Subdivision de la journée en plages horaires + nombre d'hommes et de femmes présents sur chaque tranche
            while ($debut_seance < $fin_seance) {
                $resultat_creneau = array();

                $start_str = $debut_seance->format("Y-m-d H:i:s");

                $d_start = $debut_seance->format("d");
                $m_start = $debut_seance->format("m");

                $end = $debut_seance->add(new \DateInterval("P0Y0M1DT0H0M0S"));
                $end_str = $end->format("Y-m-d H:i:s");

                $d_end = $end->format("d");
                $m_end = $end->format("m");

                $resultat_creneau["d_debut"] = $d_start;
                $resultat_creneau["m_debut"] = $m_start;
                $resultat_creneau["d_fin"] = $d_end;
                $resultat_creneau["m_fin"] = $m_end;
                $resultat_creneau["array_result"] = $this->badgeagesTranchesHoraires($start_str, $end_str);

                array_push($data_array, $resultat_creneau);

                $debut_mois += 1;
                $debut_seance = $end;
            }
        }

        $temps_seance = $this->tempsSeance($date,$date2);
        $csv_data = $this->csvData($date,$date2);

        return $this->render('controlleur_statistiques/statistiquesJour.html.twig', [
            'nb_badgeages' => count($badge_in),
           // 'plage_min' => $plage_min,
            'date' => $date,
            'date2' => $date2,
            'resultat_creneau' => $data_array,
            'temps_seance' => $temps_seance,
            'csv_data' => $csv_data
        ]);
    }

    /**
     * Sur une intervalle donnée, cette fonction donne le nombre d'hommes et de femmes présents
     * dans la salle de sport
     */
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

    /**
     * Pour une date donnée, cette fonction retourne pour toutes les personnes présentes
     * à la salle, le numéro de la carte "no_individu", le "sexe" et le "temps" passé dans la salle.
     * Ce temps sera en minutes.
     * Ces données sont renvoyées dans un tableau associatif.
     * Par exemple, si une personne est venue à la salle plusieurs fois dans la journée, il y aura aussi tous les temps
     * qu'il a passé à la salle; une durée pour chaque passage.
     */
    public function tempsSeance($date,$date2) {
        $date_format = $date . "%";
        $date_format2 = $date2 . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT DISTINCT no_mifare_inverse FROM aua_presence_seance WHERE temps between '$date_format' AND '$date_format2'"; // toutes les personnes présentes pour ce jour

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
                $tab_in = $this->getHeureIN($no_mifare_inverse, $date, $date2);

                foreach ($tab_in as $r) {
                    array_push($temps_in, $r["temps"]);
                }

                // OUT
                $tab_out = $this->getHeureOUT($no_mifare_inverse, $date, $date2);

                foreach ($tab_out as $r) {
                    array_push($temps_out, $r["temps"]);
                }

                $min = min(count($temps_in), count($temps_out));

                for ($i = 0; $i < $min ; $i++) {
                    $duree = $this->dureeSeance($temps_in[$i], $temps_out[$i]);
                    $profil["duree"] = $duree; // new add
                    array_push($temps_seance, $profil);
                }
            }
        }

        return $temps_seance;
    }

    /**
     * @Route("/no_individu/{no_mifare_inverse}", name="no_individu")
     * Un no_mifare inverse correspond à un no_individu. Un et un seul
     * Si le numéro n'est pas unique retourne "Numéro qui n'est pas unique"
     * @return string
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
     * A partir d'un numéro de carte d'une personne qui est le "no_individu"
     * retourne une chaîne de caractères correspondant au sexe de la personne
     * @return string
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
     * format de la date : YYYY-MM-DD
     * retourne un tableau des heures d'arrivées pour une personne
     * @return array
     */
    public function getHeureIN($no_mifare_inverse, $date, $date2) {
        $date_format = $date . "%";
        $date_format2 = $date2 . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'IN' AND temps between '$date_format' AND '$date_format2' ORDER BY temps";
        
        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
    }

    /**
     * format de la date : YYYY-MM-DD
     * retourne un tableau des heures de sorties pour une personne
     * @return array
     */
    public function getHeureOUT($no_mifare_inverse, $date, $date2) {
        $date_format = $date . "%";
        $date_format2 = $date2 . "%";

        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT temps FROM aua_presence_seance WHERE no_mifare_inverse = '$no_mifare_inverse' AND entreesSorties LIKE 'OUT' AND temps between '$date_format' AND '$date_format2' ORDER BY temps";
        
        $statement = $manager->getConnection()->prepare($query);
        $statement->execute();
        $resultat = $statement->fetchAll();

        return $resultat;
    }

    /**
     * format temps_in et temps_out : YYYY-MM-DD hh:mm:ss
     * retourne la durée d'une séance pour une personne en minutes
     * @return float
     */
    public function dureeSeance($temps_in, $temps_out) {
        $in = new \DateTime($temps_in);
        $out = new \DateTime($temps_out);

        $diff = $out->diff($in)->h * 3600;
        $diff += $out->diff($in)->i * 60;
        $diff += $out->diff($in)->s;

        $diff = round($diff / 60, 2);

        return $diff;
    }

    /**
     * Tester si un sexe/dénomination donnés en argument correspond à un sexe d'homme
     * @return boolean
     */
    public function isMan($sexe) {
        if ($sexe == 'M' || $sexe == 'm.') {
            return true;
        }
        return false;
    }

    /**
     * Tester si un sexe/dénomination donnés en argument correspond à un sexe d'une femme
     * @return boolean
     */
    public function isWoman($sexe) {
        if ($sexe == "F" || $sexe == "mme") {
            return true;
        }
        return false;
    }

    /**
     * retourne l'ensemble des données qui seront exportées au format csv
     * @return array
     */
    public function csvData($date,$date2) {
        $data_result = array();

        $date_format = $date . "%";
        $date_format2 = $date2 . "%";
        $manager = $this->getDoctrine()->getManager();
        $query = "SELECT no_mifare_inverse FROM aua_presence_seance WHERE temps between '$date_format' AND '$date_format2' AND entreesSorties LIKE 'IN' ORDER BY temps";

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

            $entrees = $this->getHeureIN($no_mifare_inverse, $date,$date2);
            $sorties = $this->getHeureOUT($no_mifare_inverse, $date,$date2);

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

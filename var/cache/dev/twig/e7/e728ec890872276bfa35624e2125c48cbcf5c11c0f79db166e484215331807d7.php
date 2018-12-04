<?php

/* controlleur_affichage/listeEtudiantPresent.html.twig */
class __TwigTemplate_b60af60022afbc94182e8559484b4153d373bf0ba41fc2ca903a01b366fcd80c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "controlleur_affichage/listeEtudiantPresent.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlleur_affichage/listeEtudiantPresent.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, (isset($context["liste_presence"]) || array_key_exists("liste_presence", $context) ? $context["liste_presence"] : (function () { throw new Twig_Error_Runtime('Variable "liste_presence" does not exist.', 3, $this->source); })()), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "
    <style>

        body{
            font-family: \"Times New Roman\";
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        .div_etudiant{
            border-radius: 15px;
            box-shadow: 0px 2px 5px grey;
            font-size:150%;
            font-weight:bold;
            height:1em;
        }

        .mon_footer{
            font-size:180%;
        }

        .colonne{
            color:#ECEEEF; :/* couleur blanc */
        }

        #noStudent{
            font-size:250%;
            color:rgb(68, 68, 68);
            font-weight:bold;
            text-align: center;
            margin-top:20%;
        }

        #noStudent .letter {
            display: inline-block;
            line-height: 1em;
        }

        img{
            height:100%;
            width:100%;
        }
 
    </style>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 57
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 58
        echo "
    <div class=\"container-fluid pt-3 text-left text-capitalize\">
        ";
        // line 60
        $context["compteur"] = 0;
        echo " ";
        // line 61
        echo "        ";
        $context["couleurBackground"] = "";
        echo " ";
        // line 62
        echo "        ";
        $context["rouge"] = "rgb(217,83,79)";
        echo " ";
        // line 63
        echo "        ";
        $context["orange"] = "rgb(240,173,78)";
        echo " ";
        // line 64
        echo "        ";
        $context["verte"] = "rgb(75,191,115)";
        echo " ";
        // line 65
        echo "        ";
        $context["padding_left"] = "";
        echo " ";
        // line 66
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 74, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 75
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 75, $this->source); })()) + 1);
            // line 76
            echo "
                        ";
            // line 78
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 78, $this->source); })()), "H:i"))) {
                // line 79
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 79, $this->source); })());
                echo " ";
                // line 80
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 80, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 80, $this->source); })()), "H:i")))) {
                // line 81
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 81, $this->source); })());
                echo " ";
                // line 82
                echo "                        ";
            } else {
                // line 83
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 83, $this->source); })());
                echo " ";
                // line 84
                echo "                        ";
            }
            // line 85
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 86
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 86, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 102, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 103
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 103, $this->source); })()) + 1);
            // line 104
            echo "
                         ";
            // line 106
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 106, $this->source); })()), "H:i"))) {
                // line 107
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 107, $this->source); })());
                echo " ";
                // line 108
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 108, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 108, $this->source); })()), "H:i")))) {
                // line 109
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 109, $this->source); })());
                echo " ";
                // line 110
                echo "                        ";
            } else {
                // line 111
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 111, $this->source); })());
                echo " ";
                // line 112
                echo "                        ";
            }
            // line 113
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 114
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 114, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 115
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 116
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 117
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 130
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 130, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 131
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 131, $this->source); })()) + 1);
            // line 132
            echo "
                         ";
            // line 134
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 134, $this->source); })()), "H:i"))) {
                // line 135
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 135, $this->source); })());
                echo " ";
                // line 136
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 136, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 136, $this->source); })()), "H:i")))) {
                // line 137
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 137, $this->source); })());
                echo " ";
                // line 138
                echo "                        ";
            } else {
                // line 139
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 139, $this->source); })());
                echo " ";
                // line 140
                echo "                        ";
            }
            // line 141
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 142
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 142, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 143
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 144
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 145
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 149
        echo "                </div>
            </div>
        </div>

        ";
        // line 154
        echo "
        ";
        // line 155
        if (((isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 155, $this->source); })()) == 0)) {
            // line 156
            echo "            <div id=\"noStudent\">AUCUN ETUDIANT</div>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js\"></script>
        ";
        }
        // line 159
        echo "
        <div class=\"mon_footer d-flex justify-content-between align-items-center fixed-bottom mr-5\" style=\"margin-bottom:-25px\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=medium&timezone=Europe%2FParis\" width=\"100%\" height=\"115\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:230%\">
                ";
        // line 165
        echo twig_escape_filter($this->env, (isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 165, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 165, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 172
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 173
        echo "
    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur et la largeur de la page en fonction du redimensionnement du screen -->

    <script>
        var Lscreen=document.body.offsetWidth; //Prend la largeur du screen selon son redimenssionnement
        var screenLDivise = Lscreen / 3; //permet de les partager en 3 colonnes
        var screenReduitL = screenLDivise - 10;

        var Hscreen = window.scrollMaxY + document.documentElement.clientHeight; //Prend la hauteur du screen et du scroll
        var screenHDivise = Hscreen / 13; //chiffre permettant de partager la hauteur de chaque div des étudiants en essayant de ne pas dépasser le bas de la page

        var div_etudiant =  document.getElementsByClassName(\"div_etudiant\");
        var colonne =  document.getElementsByClassName(\"colonne\");
        var div_photo = document.getElementsByClassName(\"contenant_photo\");
        
        /* On parcour toutes les classes colonne et on applique le redimensionnement des divs en 3 colonnes */
        if(colonne.length > 0){
            for (var i = 0; i < colonne.length; i++) {
                colonne[i].style.width = screenReduitL + \"px\";
            }
        }

        /* On parcour toutes les classes div_etudiant et on applique le redimensionnement des divs sur la hauteur selon la dimension actuelle du screen */
        if(div_etudiant.length > 0){
            for (var i = 0; i < div_etudiant.length; i++) {
                div_etudiant[i].style.height = screenHDivise + \"px\";
            }
        }

        /* redimensionne le conteneur des photos selon leurs div */
        if(div_photo.length > 0){
            for (var i = 0; i < div_photo.length; i++) {
                div_photo[i].style.width = screenReduitL/8 + \"px\";
                div_photo[i].style.height = screenHDivise-3 + \"px\";
            }
        }

    </script>

    <!-- Script récupérer sur le site : http://tobiasahlin.com/moving-letters/ -->
    <!-- Permet d'animer le text lorsqu'il n'y plus d'étudiant -->
    <script>
        // Wrap every letter in a span
        \$('#noStudent').each(function(){
        \$(this).html(\$(this).text().replace(/([^\\x00-\\x80]|\\w)/g, \"<span class='letter'>\$&</span>\"));
        });

        anime.timeline({loop: true})
        .add({
            targets: '#noStudent .letter',
            translateY: [-100,0],
            easing: \"easeOutExpo\",
            duration: 3000,
            delay: function(el, i) {
            return 30 * i;
            }
        }).add({
            targets: '#noStudent',
            opacity: 0,
            duration: 1000,
            easing: \"easeOutExpo\",
            delay: 3000
        });
    </script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "controlleur_affichage/listeEtudiantPresent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 173,  402 => 172,  387 => 165,  379 => 159,  374 => 156,  372 => 155,  369 => 154,  363 => 149,  353 => 145,  347 => 144,  343 => 143,  339 => 142,  336 => 141,  333 => 140,  329 => 139,  326 => 138,  322 => 137,  319 => 136,  315 => 135,  312 => 134,  309 => 132,  306 => 131,  302 => 130,  291 => 121,  281 => 117,  275 => 116,  271 => 115,  267 => 114,  264 => 113,  261 => 112,  257 => 111,  254 => 110,  250 => 109,  247 => 108,  243 => 107,  240 => 106,  237 => 104,  234 => 103,  230 => 102,  219 => 93,  209 => 89,  203 => 88,  199 => 87,  195 => 86,  192 => 85,  189 => 84,  185 => 83,  182 => 82,  178 => 81,  175 => 80,  171 => 79,  168 => 78,  165 => 76,  162 => 75,  158 => 74,  148 => 66,  144 => 65,  140 => 64,  136 => 63,  132 => 62,  128 => 61,  125 => 60,  121 => 58,  115 => 57,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block stylesheets %}

    <style>

        body{
            font-family: \"Times New Roman\";
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        .div_etudiant{
            border-radius: 15px;
            box-shadow: 0px 2px 5px grey;
            font-size:150%;
            font-weight:bold;
            height:1em;
        }

        .mon_footer{
            font-size:180%;
        }

        .colonne{
            color:#ECEEEF; :/* couleur blanc */
        }

        #noStudent{
            font-size:250%;
            color:rgb(68, 68, 68);
            font-weight:bold;
            text-align: center;
            margin-top:20%;
        }

        #noStudent .letter {
            display: inline-block;
            line-height: 1em;
        }

        img{
            height:100%;
            width:100%;
        }
 
    </style>

{% endblock %}

{% block body %}

    <div class=\"container-fluid pt-3 text-left text-capitalize\">
        {% set compteur = 0 %} {# compteur mis à jour lors du badgeage #}
        {% set couleurBackground = '' %} {# variable contenant la couleurBackground lorsque le temps de la séance d'un étudiant est dépassé #}
        {% set rouge = 'rgb(217,83,79)' %} {# représente la couleurBackground rouge #}
        {% set orange = 'rgb(240,173,78)' %} {# représente la couleurBackground orange #}
        {% set verte = 'rgb(75,191,115)' %} {# représente la couleurBackground verte #}
        {% set padding_left = '' %} {# avoir le même décalage pour toutes les div nom et prenom #}

        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    {% for present in premiereColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree >= tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree >= present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div class=\"mr-1 ml-2\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    {% for present in deuxiemeColonne %}
                        {% set compteur = compteur + 1 %}

                         {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree >= tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree >= present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div class=\"mr-1 ml-2\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    {% for present in troisiemeColonne %}
                        {% set compteur = compteur + 1 %}

                         {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree >= tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree >= present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div class=\"mr-1 ml-2\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>
        </div>

        {# S'il n'y a pas d'étudiant, je met un petit affichage : AUCUN ETUDIANTS #}

        {% if tailleDuTableauPresent == 0 %}
            <div id=\"noStudent\">AUCUN ETUDIANT</div>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js\"></script>
        {% endif %}

        <div class=\"mon_footer d-flex justify-content-between align-items-center fixed-bottom mr-5\" style=\"margin-bottom:-25px\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=medium&timezone=Europe%2FParis\" width=\"100%\" height=\"115\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:230%\">
                {{ tailleDuTableauPresent }} / {{ capacite }}
            </div>
        </div>
    </div>

{% endblock %}

{% block javascripts %}

    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur et la largeur de la page en fonction du redimensionnement du screen -->

    <script>
        var Lscreen=document.body.offsetWidth; //Prend la largeur du screen selon son redimenssionnement
        var screenLDivise = Lscreen / 3; //permet de les partager en 3 colonnes
        var screenReduitL = screenLDivise - 10;

        var Hscreen = window.scrollMaxY + document.documentElement.clientHeight; //Prend la hauteur du screen et du scroll
        var screenHDivise = Hscreen / 13; //chiffre permettant de partager la hauteur de chaque div des étudiants en essayant de ne pas dépasser le bas de la page

        var div_etudiant =  document.getElementsByClassName(\"div_etudiant\");
        var colonne =  document.getElementsByClassName(\"colonne\");
        var div_photo = document.getElementsByClassName(\"contenant_photo\");
        
        /* On parcour toutes les classes colonne et on applique le redimensionnement des divs en 3 colonnes */
        if(colonne.length > 0){
            for (var i = 0; i < colonne.length; i++) {
                colonne[i].style.width = screenReduitL + \"px\";
            }
        }

        /* On parcour toutes les classes div_etudiant et on applique le redimensionnement des divs sur la hauteur selon la dimension actuelle du screen */
        if(div_etudiant.length > 0){
            for (var i = 0; i < div_etudiant.length; i++) {
                div_etudiant[i].style.height = screenHDivise + \"px\";
            }
        }

        /* redimensionne le conteneur des photos selon leurs div */
        if(div_photo.length > 0){
            for (var i = 0; i < div_photo.length; i++) {
                div_photo[i].style.width = screenReduitL/8 + \"px\";
                div_photo[i].style.height = screenHDivise-3 + \"px\";
            }
        }

    </script>

    <!-- Script récupérer sur le site : http://tobiasahlin.com/moving-letters/ -->
    <!-- Permet d'animer le text lorsqu'il n'y plus d'étudiant -->
    <script>
        // Wrap every letter in a span
        \$('#noStudent').each(function(){
        \$(this).html(\$(this).text().replace(/([^\\x00-\\x80]|\\w)/g, \"<span class='letter'>\$&</span>\"));
        });

        anime.timeline({loop: true})
        .add({
            targets: '#noStudent .letter',
            translateY: [-100,0],
            easing: \"easeOutExpo\",
            duration: 3000,
            delay: function(el, i) {
            return 30 * i;
            }
        }).add({
            targets: '#noStudent',
            opacity: 0,
            duration: 1000,
            easing: \"easeOutExpo\",
            delay: 3000
        });
    </script>

{% endblock %}
", "controlleur_affichage/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_affichage/listeEtudiantPresent.html.twig");
    }
}

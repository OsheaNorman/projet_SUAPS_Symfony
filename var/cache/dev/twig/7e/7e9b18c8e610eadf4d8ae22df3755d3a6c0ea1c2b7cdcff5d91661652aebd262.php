<?php

/* controlleur_test/listeEtudiantPresent.html.twig */
class __TwigTemplate_8954a19da831f425953613755fe98fdc096faa387f44beb444fb6e39ce329e86 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "controlleur_test/listeEtudiantPresent.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlleur_test/listeEtudiantPresent.html.twig"));

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
            font-size:1.8em;
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        #div_etudiant_1, #div_etudiant_2, #div_etudiant_3{
            height:74px;
            border-radius: 15px;/* 50px 30px;*/
            box-shadow: 0px 2px 5px grey;
        }

        #div_etudiant_1 > div:nth-child(1), #div_etudiant_2 > div:nth-child(1), #div_etudiant_3 > div:nth-child(1){
            font-weight:bold;
        }

        #colonne1, #colonne2, #colonne3{
            color:#ECEEEF;
        }

    </style>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 38
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 39
        echo "
    <div class=\"container-fluid pt-3 text-left text-capitalize\">
        ";
        // line 41
        $context["compteur"] = 0;
        echo " ";
        // line 42
        echo "        ";
        $context["couleurBackground"] = "";
        echo " ";
        // line 43
        echo "        ";
        $context["rouge"] = "rgb(217,83,79)";
        echo " ";
        // line 44
        echo "        ";
        $context["orange"] = "rgb(240,173,78)";
        echo " ";
        // line 45
        echo "        ";
        $context["verte"] = "rgb(75,191,115)";
        echo " ";
        // line 46
        echo "        ";
        $context["padding_left"] = "";
        echo " ";
        // line 47
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div id=\"colonne1\" class=\"d-flex flex-column\">
                    ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 55, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 56
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 56, $this->source); })()) + 1);
            // line 57
            echo "
                        ";
            // line 59
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 59, $this->source); })()), "H:i"))) {
                // line 60
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 60, $this->source); })());
                echo " ";
                // line 61
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 61, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 61, $this->source); })()), "H:i")))) {
                // line 62
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 62, $this->source); })());
                echo " ";
                // line 63
                echo "                        ";
            } else {
                // line 64
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 64, $this->source); })());
                echo " ";
                // line 65
                echo "                        ";
            }
            // line 66
            echo "
                        <div id=\"div_etudiant_1\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 67, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 68, $this->source); })()), "html", null, true);
            echo "</div>

                            ";
            // line 71
            echo "                            ";
            if (((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 71, $this->source); })()) > 9)) {
                // line 72
                echo "                                ";
                $context["padding_left"] = "pl-1";
                // line 73
                echo "                            ";
            } else {
                // line 74
                echo "                                ";
                $context["padding_left"] = "pl-4";
                // line 75
                echo "                            ";
            }
            // line 76
            echo "
                            <div class=\"";
            // line 77
            echo twig_escape_filter($this->env, (isset($context["padding_left"]) || array_key_exists("padding_left", $context) ? $context["padding_left"] : (function () { throw new Twig_Error_Runtime('Variable "padding_left" does not exist.', 77, $this->source); })()), "html", null, true);
            echo " flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div>";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div id=\"colonne2\" class=\"d-flex flex-column\">
                    ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 91, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 92
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 92, $this->source); })()) + 1);
            // line 93
            echo "
                        ";
            // line 95
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 95, $this->source); })()), "H:i"))) {
                // line 96
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 96, $this->source); })());
                echo " ";
                // line 97
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 97, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 97, $this->source); })()), "H:i")))) {
                // line 98
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 98, $this->source); })());
                echo " ";
                // line 99
                echo "                        ";
            } else {
                // line 100
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 100, $this->source); })());
                echo " ";
                // line 101
                echo "                        ";
            }
            // line 102
            echo "
                        <div id=\"div_etudiant_2\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 103
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 103, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 104
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 104, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div>";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div id=\"colonne3\" class=\"d-flex flex-column\">
                    ";
        // line 119
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 119, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 120
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 120, $this->source); })()) + 1);
            // line 121
            echo "
                        ";
            // line 123
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 123, $this->source); })()), "H:i"))) {
                // line 124
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 124, $this->source); })());
                echo " ";
                // line 125
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 125, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 125, $this->source); })()), "H:i")))) {
                // line 126
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 126, $this->source); })());
                echo " ";
                // line 127
                echo "                        ";
            } else {
                // line 128
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 128, $this->source); })());
                echo " ";
                // line 129
                echo "                        ";
            }
            // line 130
            echo "
                        <div id=\"div_etudiant_3\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 131
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 131, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 132
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 132, $this->source); })()), "html", null, true);
            echo "</div>                            
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 133
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div>";
            // line 134
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "                </div>
            </div>
        </div>

        ";
        // line 143
        echo "
        ";
        // line 144
        if (((isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 144, $this->source); })()) == 0)) {
            // line 145
            echo "            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%;\">AUCUN ETUDIANT</div>
            </div>
        ";
        }
        // line 149
        echo "
        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:50px\">
                ";
        // line 155
        echo twig_escape_filter($this->env, (isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 155, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 155, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 162
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 163
        echo "
    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur et la largeur de la page en fonction du redimensionnement du screen -->

    <script>
        var Lscreen=document.body.offsetWidth; //Prend la largeur du screen selon son redimenssionnement
        var screenDivise = Lscreen / 3; //permet de les partager en 3 colonnes
        var screenReduit = screenDivise - 10;

        /* J'applique sur chaque ddiv des colonnes la largeurs screenReduit */

        var colonne1 = document.getElementById(\"colonne1\");
        colonne1.style.width = screenReduit + \"px\";

        var colonne2 = document.getElementById(\"colonne2\");
        colonne2.style.width = screenReduit + \"px\";

        var colonne3 = document.getElementById(\"colonne3\");
        colonne3.style.width = screenReduit + \"px\";
    </script>
    
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "controlleur_test/listeEtudiantPresent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 163,  405 => 162,  390 => 155,  382 => 149,  376 => 145,  374 => 144,  371 => 143,  365 => 138,  355 => 134,  349 => 133,  345 => 132,  341 => 131,  338 => 130,  335 => 129,  331 => 128,  328 => 127,  324 => 126,  321 => 125,  317 => 124,  314 => 123,  311 => 121,  308 => 120,  304 => 119,  293 => 110,  283 => 106,  277 => 105,  273 => 104,  269 => 103,  266 => 102,  263 => 101,  259 => 100,  256 => 99,  252 => 98,  249 => 97,  245 => 96,  242 => 95,  239 => 93,  236 => 92,  232 => 91,  221 => 82,  211 => 78,  203 => 77,  200 => 76,  197 => 75,  194 => 74,  191 => 73,  188 => 72,  185 => 71,  180 => 68,  176 => 67,  173 => 66,  170 => 65,  166 => 64,  163 => 63,  159 => 62,  156 => 61,  152 => 60,  149 => 59,  146 => 57,  143 => 56,  139 => 55,  129 => 47,  125 => 46,  121 => 45,  117 => 44,  113 => 43,  109 => 42,  106 => 41,  102 => 39,  96 => 38,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block stylesheets %}

    <style>

        body{
            font-family: \"Times New Roman\";
            font-size:1.8em;
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        #div_etudiant_1, #div_etudiant_2, #div_etudiant_3{
            height:74px;
            border-radius: 15px;/* 50px 30px;*/
            box-shadow: 0px 2px 5px grey;
        }

        #div_etudiant_1 > div:nth-child(1), #div_etudiant_2 > div:nth-child(1), #div_etudiant_3 > div:nth-child(1){
            font-weight:bold;
        }

        #colonne1, #colonne2, #colonne3{
            color:#ECEEEF;
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
                <div id=\"colonne1\" class=\"d-flex flex-column\">
                    {% for present in premiereColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree > present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div id=\"div_etudiant_1\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>

                            {# permet d'avoir le même décalage de la div nom et prenom #}
                            {% if compteur > 9 %}
                                {% set padding_left = 'pl-1' %}
                            {% else %}
                                {% set padding_left = 'pl-4' %}
                            {% endif %}

                            <div class=\"{{ padding_left }} flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div>{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div id=\"colonne2\" class=\"d-flex flex-column\">
                    {% for present in deuxiemeColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree > present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div id=\"div_etudiant_2\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div>{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div id=\"colonne3\" class=\"d-flex flex-column\">
                    {% for present in troisiemeColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleurBackground lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = rouge %} {# couleur du background en rouge #}
                        {% elseif present.duree > present.orange or minute15|date('H:i') > tempsMinimums|date('H:i') %}
                            {% set couleurBackground = orange %} {# couleur du background en orange #}
                        {% else %}
                            {% set couleurBackground = verte %} {# couleur du background en vert #}
                        {% endif %}

                        <div id=\"div_etudiant_3\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>                            
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">{{ present.nom }} {{ present.prenom }}</div>
                            <div>{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>
        </div>

        {# S'il n'y a pas d'étudiant, je met un petit affichage : AUCUN ETUDIANTS #}

        {% if tailleDuTableauPresent == 0 %}
            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%;\">AUCUN ETUDIANT</div>
            </div>
        {% endif %}

        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:50px\">
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
        var screenDivise = Lscreen / 3; //permet de les partager en 3 colonnes
        var screenReduit = screenDivise - 10;

        /* J'applique sur chaque ddiv des colonnes la largeurs screenReduit */

        var colonne1 = document.getElementById(\"colonne1\");
        colonne1.style.width = screenReduit + \"px\";

        var colonne2 = document.getElementById(\"colonne2\");
        colonne2.style.width = screenReduit + \"px\";

        var colonne3 = document.getElementById(\"colonne3\");
        colonne3.style.width = screenReduit + \"px\";
    </script>
    
{% endblock %}
", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

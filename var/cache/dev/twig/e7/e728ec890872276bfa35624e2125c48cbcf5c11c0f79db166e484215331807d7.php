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
            font-size:180%;
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        .div_etudiant{
            /*height:73px;*/
            border-radius: 15px;/* 50px 30px;*/
            box-shadow: 0px 2px 5px grey;
        }

        .div_etudiant > div:nth-child(1){
            font-weight:bold;
        }

        .colonne{
            color:#ECEEEF;
        }

        #noStudent{
            font-size:250%;
            color:rgb(68, 68, 68);
            font-family:;
            font-weight:bold;
            text-align: center;
            margin-top:20%;
        }

        #noStudent .letter {
            display: inline-block;
            line-height: 1em;
        }

        img{
            max-height:70px;
            max-width:70px;
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
                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 86
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 86, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 87
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 87, $this->source); })()), "html", null, true);
            echo "</div>

                            ";
            // line 90
            echo "                            ";
            if (((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 90, $this->source); })()) > 9)) {
                // line 91
                echo "                                ";
                $context["padding_left"] = "pl-1";
                // line 92
                echo "                            ";
            } else {
                // line 93
                echo "                                ";
                $context["padding_left"] = "pl-4";
                // line 94
                echo "                            ";
            }
            // line 95
            echo "
                            <div class=\"";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["padding_left"]) || array_key_exists("padding_left", $context) ? $context["padding_left"] : (function () { throw new Twig_Error_Runtime('Variable "padding_left" does not exist.', 96, $this->source); })()), "html", null, true);
            echo "\"><img class=\"photo\" src=\"data:image/png;base64, ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 111, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 112
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 112, $this->source); })()) + 1);
            // line 113
            echo "
                         ";
            // line 115
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 115, $this->source); })()), "H:i"))) {
                // line 116
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 116, $this->source); })());
                echo " ";
                // line 117
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 117, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 117, $this->source); })()), "H:i")))) {
                // line 118
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 118, $this->source); })());
                echo " ";
                // line 119
                echo "                        ";
            } else {
                // line 120
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 120, $this->source); })());
                echo " ";
                // line 121
                echo "                        ";
            }
            // line 122
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 123
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 123, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 124
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 124, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"pl-3 pt-1\"><img class=\"photo\" src=\"data:image/png;base64, ";
            // line 125
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 126
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 127
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 140, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 141
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 141, $this->source); })()) + 1);
            // line 142
            echo "
                         ";
            // line 144
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 144, $this->source); })()), "H:i"))) {
                // line 145
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 145, $this->source); })());
                echo " ";
                // line 146
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 146, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 146, $this->source); })()), "H:i")))) {
                // line 147
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 147, $this->source); })());
                echo " ";
                // line 148
                echo "                        ";
            } else {
                // line 149
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 149, $this->source); })());
                echo " ";
                // line 150
                echo "                        ";
            }
            // line 151
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 152
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 152, $this->source); })()), "html", null, true);
            echo ";\">
                            <div>";
            // line 153
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 153, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"pl-3 pt-1\"><img class=\"photo\" src=\"data:image/png;base64, ";
            // line 154
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 155
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 156
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "                </div>
            </div>
        </div>

        ";
        // line 165
        echo "
        ";
        // line 166
        if (((isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 166, $this->source); })()) == 0)) {
            // line 167
            echo "            <div id=\"noStudent\">AUCUN ETUDIANT</div>
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js\"></script>
        ";
        }
        // line 170
        echo "
        <div class=\"d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\" style=\"margin-bottom:-30px\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130%\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:250%\">
                ";
        // line 176
        echo twig_escape_filter($this->env, (isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 176, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 176, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 183
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 184
        echo "
    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur et la largeur de la page en fonction du redimensionnement du screen -->

    <script>
        var Lscreen=document.body.offsetWidth; //Prend la largeur du screen selon son redimenssionnement
        var screenLDivise = Lscreen / 3; //permet de les partager en 3 colonnes
        var screenReduitL = screenLDivise - 10;

        /* J'applique sur chaque div des colonnes la largeurs screenReduitL */

        var colonne =  document.getElementsByClassName(\"colonne\");
        
        /* On parcour toutes les classes colonne et on applique le redimensionnement des divs sur chaque div */
        if(colonne.length > 0){
            for (var i = 0; i < colonne.length; i++) {
                colonne[i].style.width = screenReduitL + \"px\";
            }
        }

        var Hscreen = window.scrollMaxY + document.documentElement.clientHeight; //Prend la hauteur du screen et du scroll
        var screenHDivise = Hscreen / 13; //chiffre permettant de partager la hauteur de chaque div des étudiants en essayant de ne pas dépasser le bas de la page
        var div_etudiant =  document.getElementsByClassName(\"div_etudiant\");
        var photo = document.getElementsByClassName(\"photo\");

        /* On parcour toutes les classes div_etudiant et on applique le redimensionnement des divs sur chaque div */
         
        if(div_etudiant.length > 0){
            for (var i = 0; i < div_etudiant.length; i++) {
                div_etudiant[i].style.height = screenHDivise + \"px\";
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
        return array (  441 => 184,  435 => 183,  420 => 176,  412 => 170,  407 => 167,  405 => 166,  402 => 165,  396 => 160,  386 => 156,  380 => 155,  376 => 154,  372 => 153,  368 => 152,  365 => 151,  362 => 150,  358 => 149,  355 => 148,  351 => 147,  348 => 146,  344 => 145,  341 => 144,  338 => 142,  335 => 141,  331 => 140,  320 => 131,  310 => 127,  304 => 126,  300 => 125,  296 => 124,  292 => 123,  289 => 122,  286 => 121,  282 => 120,  279 => 119,  275 => 118,  272 => 117,  268 => 116,  265 => 115,  262 => 113,  259 => 112,  255 => 111,  244 => 102,  234 => 98,  228 => 97,  222 => 96,  219 => 95,  216 => 94,  213 => 93,  210 => 92,  207 => 91,  204 => 90,  199 => 87,  195 => 86,  192 => 85,  189 => 84,  185 => 83,  182 => 82,  178 => 81,  175 => 80,  171 => 79,  168 => 78,  165 => 76,  162 => 75,  158 => 74,  148 => 66,  144 => 65,  140 => 64,  136 => 63,  132 => 62,  128 => 61,  125 => 60,  121 => 58,  115 => 57,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block stylesheets %}

    <style>

        body{
            font-family: \"Times New Roman\";
            font-size:180%;
            font-stretch: semi-condensed;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:white;
            color:black;
        }

        .div_etudiant{
            /*height:73px;*/
            border-radius: 15px;/* 50px 30px;*/
            box-shadow: 0px 2px 5px grey;
        }

        .div_etudiant > div:nth-child(1){
            font-weight:bold;
        }

        .colonne{
            color:#ECEEEF;
        }

        #noStudent{
            font-size:250%;
            color:rgb(68, 68, 68);
            font-family:;
            font-weight:bold;
            text-align: center;
            margin-top:20%;
        }

        #noStudent .letter {
            display: inline-block;
            line-height: 1em;
        }

        img{
            max-height:70px;
            max-width:70px;
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

                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>

                            {# permet d'avoir le même décalage de la div nom et prenom #}
                            {% if compteur > 9 %}
                                {% set padding_left = 'pl-1' %}
                            {% else %}
                                {% set padding_left = 'pl-4' %}
                            {% endif %}

                            <div class=\"{{ padding_left }}\"><img class=\"photo\" src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
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

                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>
                            <div class=\"pl-3 pt-1\"><img class=\"photo\" src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
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

                        <div class=\"div_etudiant d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleurBackground }};\">
                            <div>{{ compteur }}</div>
                            <div class=\"pl-3 pt-1\"><img class=\"photo\" src=\"data:image/png;base64, {{ present.photo }}\" alt=\"Phot\"></div>
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

        <div class=\"d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\" style=\"margin-bottom:-30px\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130%\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:250%\">
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

        /* J'applique sur chaque div des colonnes la largeurs screenReduitL */

        var colonne =  document.getElementsByClassName(\"colonne\");
        
        /* On parcour toutes les classes colonne et on applique le redimensionnement des divs sur chaque div */
        if(colonne.length > 0){
            for (var i = 0; i < colonne.length; i++) {
                colonne[i].style.width = screenReduitL + \"px\";
            }
        }

        var Hscreen = window.scrollMaxY + document.documentElement.clientHeight; //Prend la hauteur du screen et du scroll
        var screenHDivise = Hscreen / 13; //chiffre permettant de partager la hauteur de chaque div des étudiants en essayant de ne pas dépasser le bas de la page
        var div_etudiant =  document.getElementsByClassName(\"div_etudiant\");
        var photo = document.getElementsByClassName(\"photo\");

        /* On parcour toutes les classes div_etudiant et on applique le redimensionnement des divs sur chaque div */
         
        if(div_etudiant.length > 0){
            for (var i = 0; i < div_etudiant.length; i++) {
                div_etudiant[i].style.height = screenHDivise + \"px\";
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
", "controlleur_affichage/listeEtudiantPresent.html.twig", "/home/etudiant/blog/templates/controlleur_affichage/listeEtudiantPresent.html.twig");
    }
}

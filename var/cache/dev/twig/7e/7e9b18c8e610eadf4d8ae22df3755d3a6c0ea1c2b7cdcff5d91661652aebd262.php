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
        echo "    <style>
        body{
            font-family: \"Times New Roman\";
            font-size:1.8em;
            font-stretch: semi-condensed;
            color:black;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:#FDF5E6;
        }

        #divEtu{
            height:70px;
            border-radius: 15px 50px 30px;
            box-shadow: 0px 2px 5px grey;
        }

        #divEtu > div:nth-child(1){
            font-weight:bold;
        }
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 31
        echo "
    <div id=\"conteneurPrincipale\" class=\"container-fluid pt-3 text-left text-capitalize\">
        ";
        // line 33
        $context["compteur"] = 0;
        echo " ";
        // line 34
        echo "        ";
        $context["couleur"] = "";
        echo " ";
        // line 35
        echo "        ";
        $context["rouge"] = "rgba(255, 0, 0, 0.7);";
        echo " ";
        // line 36
        echo "        ";
        $context["orange"] = "rgba(255, 165, 0, 0.7)";
        echo " ";
        // line 37
        echo "        ";
        $context["verte"] = "rgba(0, 255, 0, 0.7);";
        echo " ";
        // line 38
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 47
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 47, $this->source); })()) + 1);
            // line 48
            echo "
                        ";
            // line 50
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 50, $this->source); })()), "H:i:s"))) {
                // line 51
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 51, $this->source); })());
                echo " ";
                // line 52
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 53
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 53, $this->source); })());
                echo " ";
                // line 54
                echo "                        ";
            } else {
                // line 55
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 55, $this->source); })());
                echo " ";
                // line 56
                echo "                        ";
            }
            // line 57
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 58
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 58, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 59, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 62, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 75, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 76
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 76, $this->source); })()) + 1);
            // line 77
            echo "
                        ";
            // line 79
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 79, $this->source); })()), "H:i:s"))) {
                // line 80
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 80, $this->source); })());
                echo " ";
                // line 81
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 82
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 82, $this->source); })());
                echo " ";
                // line 83
                echo "                        ";
            } else {
                // line 84
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 84, $this->source); })());
                echo " ";
                // line 85
                echo "                        ";
            }
            // line 86
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 87
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 87, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 88
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 88, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 90
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 91
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 91, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 104, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 105
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 105, $this->source); })()) + 1);
            // line 106
            echo "
                        ";
            // line 108
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 108, $this->source); })()), "H:i:s"))) {
                // line 109
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 109, $this->source); })());
                echo " ";
                // line 110
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 111
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 111, $this->source); })());
                echo " ";
                // line 112
                echo "                        ";
            } else {
                // line 113
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 113, $this->source); })());
                echo " ";
                // line 114
                echo "                        ";
            }
            // line 115
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 116
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 116, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 117
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 117, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 118
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 119
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 120
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 120, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "                </div>
            </div>
        </div>

        ";
        // line 129
        echo "
        ";
        // line 130
        if (((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 130, $this->source); })()) == 0)) {
            // line 131
            echo "            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%; text-color:black;\">AUCUN ETUDIANT</div>
            </div>
        ";
        }
        // line 135
        echo "
        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:50px\">
                ";
        // line 141
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 141, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 141, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 148
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 149
        echo "
    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur de la page -->

    <script>
        var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;

        var conteneurPrincipale = document.getElementById(\"noStudent\"); //J'aplique sur la div qui gère 'AUCUN ETUDIANTS'
        conteneurPrincipale.style.height = h + \"px\";
        //conteneurPrincipale.style.height = \"1079px\";
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
        return array (  390 => 149,  384 => 148,  369 => 141,  361 => 135,  355 => 131,  353 => 130,  350 => 129,  344 => 124,  332 => 120,  328 => 119,  324 => 118,  320 => 117,  316 => 116,  313 => 115,  310 => 114,  306 => 113,  303 => 112,  299 => 111,  296 => 110,  292 => 109,  289 => 108,  286 => 106,  283 => 105,  279 => 104,  268 => 95,  256 => 91,  252 => 90,  248 => 89,  244 => 88,  240 => 87,  237 => 86,  234 => 85,  230 => 84,  227 => 83,  223 => 82,  220 => 81,  216 => 80,  213 => 79,  210 => 77,  207 => 76,  203 => 75,  192 => 66,  180 => 62,  176 => 61,  172 => 60,  168 => 59,  164 => 58,  161 => 57,  158 => 56,  154 => 55,  151 => 54,  147 => 53,  144 => 52,  140 => 51,  137 => 50,  134 => 48,  131 => 47,  127 => 46,  117 => 38,  113 => 37,  109 => 36,  105 => 35,  101 => 34,  98 => 33,  94 => 31,  88 => 30,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
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
            color:black;
            letter-spacing: 2px;
            font-weight: lighter;
            font-variant: small-caps;
            background-color:#FDF5E6;
        }

        #divEtu{
            height:70px;
            border-radius: 15px 50px 30px;
            box-shadow: 0px 2px 5px grey;
        }

        #divEtu > div:nth-child(1){
            font-weight:bold;
        }
    </style>
{% endblock %}

{% block body %}

    <div id=\"conteneurPrincipale\" class=\"container-fluid pt-3 text-left text-capitalize\">
        {% set compteur = 0 %} {# compteur mis à jour lors du badgeage et du debageage #}
        {% set couleur = '' %} {# variable contenant la couleur lorsque le temps de la séance d'un étudiant est dépassé #}
        {% set rouge = 'rgba(255, 0, 0, 0.7);'%} {# représente la couleur rouge #}
        {% set orange = 'rgba(255, 165, 0, 0.7)' %} {# représente la couleur orange #}
        {% set verte = 'rgba(0, 255, 0, 0.7);' %} {# représente la couleur verte #}

        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    {% for present in premiereColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i:s') %}
                            {% set couleur = rouge %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = orange %} {# orange #}
                        {% else %}
                            {% set couleur = verte %} {# vert #}
                        {% endif %}

                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleur }};\">
                            <div class=\"flex-grow-1\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    {% for present in deuxiemeColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i:s') %}
                            {% set couleur = rouge %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = orange %} {# orange #}
                        {% else %}
                            {% set couleur = verte %} {# vert #}
                        {% endif %}

                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleur }};\">
                            <div class=\"flex-grow-1\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    {% for present in troisiemeColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimums|date('H:i:s') %}
                            {% set couleur = rouge %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = orange %} {# orange #}
                        {% else %}
                            {% set couleur = verte %} {# vert #}
                        {% endif %}

                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:{{ couleur }};\">
                            <div class=\"flex-grow-1\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
                        </div>

                    {% endfor %}
                </div>
            </div>
        </div>

        {# S'il n'y a pas d'étudiant, je met un petit affichage : AUCUN ETUDIANTS #}

        {% if compteur == 0 %}
            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%; text-color:black;\">AUCUN ETUDIANT</div>
            </div>
        {% endif %}

        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:50px\">
                {{ compteur }} / {{ capacite }}
            </div>
        </div>
    </div>

{% endblock %}

{% block javascripts %}

    <script src=\"jquery.js\"></script>

    <!-- Calcul de la hauteur de la page -->

    <script>
        var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;

        var conteneurPrincipale = document.getElementById(\"noStudent\"); //J'aplique sur la div qui gère 'AUCUN ETUDIANTS'
        conteneurPrincipale.style.height = h + \"px\";
        //conteneurPrincipale.style.height = \"1079px\";
    </script>
    
{% endblock %}
", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

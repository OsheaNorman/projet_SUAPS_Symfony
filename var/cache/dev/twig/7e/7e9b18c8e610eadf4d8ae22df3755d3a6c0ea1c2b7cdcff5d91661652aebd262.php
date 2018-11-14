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
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
    <div id=\"conteneurPrincipale\" class=\"container-fluid pt-3 text-left text-capitalize\">
        ";
        // line 8
        $context["compteur"] = 0;
        echo " ";
        // line 9
        echo "        ";
        $context["couleur"] = "";
        echo " ";
        // line 10
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 18, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 19
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 19, $this->source); })()) + 1);
            // line 20
            echo "
                        ";
            // line 22
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimum"]) || array_key_exists("tempsMinimum", $context) ? $context["tempsMinimum"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimum" does not exist.', 22, $this->source); })()), "H:i:s"))) {
                // line 23
                echo "                            ";
                $context["couleur"] = "#FF0000";
                echo " ";
                // line 24
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 25
                echo "                            ";
                $context["couleur"] = "#CCCC00";
                echo " ";
                // line 26
                echo "                        ";
            } else {
                // line 27
                echo "                            ";
                $context["couleur"] = "#00BB00";
                echo " ";
                // line 28
                echo "                        ";
            }
            // line 29
            echo "
                        <div id=\"affiche\" class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 31, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 31, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 32, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 33
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 33, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 34, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 47, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 48
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 48, $this->source); })()) + 1);
            // line 49
            echo "
                        ";
            // line 51
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimum"]) || array_key_exists("tempsMinimum", $context) ? $context["tempsMinimum"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimum" does not exist.', 51, $this->source); })()), "H:i:s"))) {
                // line 52
                echo "                            ";
                $context["couleur"] = "#FF0000";
                echo " ";
                // line 53
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 54
                echo "                            ";
                $context["couleur"] = "#CCCC00";
                echo " ";
                // line 55
                echo "                        ";
            } else {
                // line 56
                echo "                            ";
                $context["couleur"] = "#00BB00";
                echo " ";
                // line 57
                echo "                        ";
            }
            // line 58
            echo "
                        <div class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 60
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 60, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 60, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 61, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 62, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 63, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 76, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 77
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 77, $this->source); })()) + 1);
            // line 78
            echo "
                        ";
            // line 80
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimum"]) || array_key_exists("tempsMinimum", $context) ? $context["tempsMinimum"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimum" does not exist.', 80, $this->source); })()), "H:i:s"))) {
                // line 81
                echo "                            ";
                $context["couleur"] = "#FF0000";
                echo " ";
                // line 82
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 83
                echo "                            ";
                $context["couleur"] = "#CCCC00";
                echo " ";
                // line 84
                echo "                        ";
            } else {
                // line 85
                echo "                            ";
                $context["couleur"] = "#00BB00";
                echo " ";
                // line 86
                echo "                        ";
            }
            // line 87
            echo "
                        <div class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 89
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 89, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 89, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 90, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\" style=\"color:";
            // line 91
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 91, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:";
            // line 92
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 92, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "                </div>
            </div>
        </div>

        ";
        // line 101
        echo "
        ";
        // line 102
        if (((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 102, $this->source); })()) == 0)) {
            // line 103
            echo "            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%; text-color:black;\">AUCUN ETUDIANT</div>
            </div>
        ";
        }
        // line 107
        echo "
        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe style=\"color:black\" src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"color:#181907; font-size:50px\">
                ";
        // line 113
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 113, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 113, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 120
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 121
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
        return array (  351 => 121,  345 => 120,  330 => 113,  322 => 107,  316 => 103,  314 => 102,  311 => 101,  305 => 96,  293 => 92,  287 => 91,  281 => 90,  275 => 89,  271 => 87,  268 => 86,  264 => 85,  261 => 84,  257 => 83,  254 => 82,  250 => 81,  247 => 80,  244 => 78,  241 => 77,  237 => 76,  226 => 67,  214 => 63,  208 => 62,  202 => 61,  196 => 60,  192 => 58,  189 => 57,  185 => 56,  182 => 55,  178 => 54,  175 => 53,  171 => 52,  168 => 51,  165 => 49,  162 => 48,  158 => 47,  147 => 38,  135 => 34,  129 => 33,  123 => 32,  117 => 31,  113 => 29,  110 => 28,  106 => 27,  103 => 26,  99 => 25,  96 => 24,  92 => 23,  89 => 22,  86 => 20,  83 => 19,  79 => 18,  69 => 10,  65 => 9,  62 => 8,  58 => 6,  52 => 5,  40 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block body %}

    <div id=\"conteneurPrincipale\" class=\"container-fluid pt-3 text-left text-capitalize\">
        {% set compteur = 0 %} {# compteur mis à jour lors du badgeage et du debageage #}
        {% set couleur = '' %} {# variable contenant la couleur lorsque le temps de la séance d'un étudiant est dépassé #}

        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    {% for present in premiereColonne %}
                        {% set compteur = compteur + 1 %}

                        {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
                        {% if present.duree > tempsMinimum|date('H:i:s') %}
                            {% set couleur = '#FF0000' %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = '#CCCC00' %} {# orange #}
                        {% else %}
                            {% set couleur = '#00BB00' %} {# vert #}
                        {% endif %}

                        <div id=\"affiche\" class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
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
                        {% if present.duree > tempsMinimum|date('H:i:s') %}
                            {% set couleur = '#FF0000' %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = '#CCCC00' %} {# orange #}
                        {% else %}
                            {% set couleur = '#00BB00' %} {# vert #}
                        {% endif %}

                        <div class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
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
                        {% if present.duree > tempsMinimum|date('H:i:s') %}
                            {% set couleur = '#FF0000' %} {# rouge #}
                        {% elseif present.duree > present.orange %}
                            {% set couleur = '#CCCC00' %} {# orange #}
                        {% else %}
                            {% set couleur = '#00BB00' %} {# vert #}
                        {% endif %}

                        <div class=\"d-flex align-items-center pl-3 pr-3 mb-1 mr-2 rounded\" style=\"height: 70px; background-color:#E6E6E6;\">
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ compteur }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.nom }}</div>
                            <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.prenom }}</div>
                            <div><span class=\"badge p-2\" style=\"color:white; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
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
                <iframe style=\"color:black\" src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"color:#181907; font-size:50px\">
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

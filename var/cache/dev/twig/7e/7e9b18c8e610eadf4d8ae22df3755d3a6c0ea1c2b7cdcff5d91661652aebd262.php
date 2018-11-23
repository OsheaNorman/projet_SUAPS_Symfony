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
        echo "        ";
        $context["rouge"] = "rgba(255, 0, 0, 0.7);";
        echo " ";
        // line 11
        echo "        ";
        $context["orange"] = "rgba(255, 165, 0, 0.7)";
        echo " ";
        // line 12
        echo "        ";
        $context["verte"] = "rgba(0, 255, 0, 0.7);";
        echo " ";
        // line 13
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 21, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 22
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 22, $this->source); })()) + 1);
            // line 23
            echo "
                        ";
            // line 25
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 25, $this->source); })()), "H:i:s"))) {
                // line 26
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 26, $this->source); })());
                echo " ";
                // line 27
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 28
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 28, $this->source); })());
                echo " ";
                // line 29
                echo "                        ";
            } else {
                // line 30
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 30, $this->source); })());
                echo " ";
                // line 31
                echo "                        ";
            }
            // line 32
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 33
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 33, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 34, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 37, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 50, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 51
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 51, $this->source); })()) + 1);
            // line 52
            echo "
                        ";
            // line 54
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 54, $this->source); })()), "H:i:s"))) {
                // line 55
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 55, $this->source); })());
                echo " ";
                // line 56
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 57
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 57, $this->source); })());
                echo " ";
                // line 58
                echo "                        ";
            } else {
                // line 59
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 59, $this->source); })());
                echo " ";
                // line 60
                echo "                        ";
            }
            // line 61
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 62, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 63, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 66, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"d-flex flex-column\" style=\"width:100%;\">
                    ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 79, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 80
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 80, $this->source); })()) + 1);
            // line 81
            echo "
                        ";
            // line 83
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 83, $this->source); })()), "H:i:s"))) {
                // line 84
                echo "                            ";
                $context["couleur"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 84, $this->source); })());
                echo " ";
                // line 85
                echo "                        ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 86
                echo "                            ";
                $context["couleur"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 86, $this->source); })());
                echo " ";
                // line 87
                echo "                        ";
            } else {
                // line 88
                echo "                            ";
                $context["couleur"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 88, $this->source); })());
                echo " ";
                // line 89
                echo "                        ";
            }
            // line 90
            echo "
                        <div id=\"divEtu\" class=\"d-flex align-items-center pl-3 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 91
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 91, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"flex-grow-1\">";
            // line 92
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 92, $this->source); })()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 93
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                            <div class=\"flex-grow-1\">";
            // line 94
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div><span class=\"badge p-2\" style=\"color:black; background-color:";
            // line 95
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 95, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "                </div>
            </div>
        </div>

        ";
        // line 104
        echo "
        ";
        // line 105
        if (((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 105, $this->source); })()) == 0)) {
            // line 106
            echo "            <div id=\"noStudent\" class=\"d-flex align-items-center justify-content-center\">
                <div class=\"font-weight-bold\" style=\"font-size:200%; text-color:black;\">AUCUN ETUDIANT</div>
            </div>
        ";
        }
        // line 110
        echo "
        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:50px\">
                ";
        // line 116
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 116, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 116, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 123
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 124
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
        return array (  354 => 124,  348 => 123,  333 => 116,  325 => 110,  319 => 106,  317 => 105,  314 => 104,  308 => 99,  296 => 95,  292 => 94,  288 => 93,  284 => 92,  280 => 91,  277 => 90,  274 => 89,  270 => 88,  267 => 87,  263 => 86,  260 => 85,  256 => 84,  253 => 83,  250 => 81,  247 => 80,  243 => 79,  232 => 70,  220 => 66,  216 => 65,  212 => 64,  208 => 63,  204 => 62,  201 => 61,  198 => 60,  194 => 59,  191 => 58,  187 => 57,  184 => 56,  180 => 55,  177 => 54,  174 => 52,  171 => 51,  167 => 50,  156 => 41,  144 => 37,  140 => 36,  136 => 35,  132 => 34,  128 => 33,  125 => 32,  122 => 31,  118 => 30,  115 => 29,  111 => 28,  108 => 27,  104 => 26,  101 => 25,  98 => 23,  95 => 22,  91 => 21,  81 => 13,  77 => 12,  73 => 11,  69 => 10,  65 => 9,  62 => 8,  58 => 6,  52 => 5,  40 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

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
", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

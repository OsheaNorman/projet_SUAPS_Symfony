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
    <link rel=\"stylesheet\" href=\"/css/style.css\">

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "
    <div class=\"container-fluid pt-3 text-left text-capitalize\">
        ";
        // line 14
        $context["compteur"] = 0;
        echo " ";
        // line 15
        echo "        ";
        $context["couleurBackground"] = "";
        echo " ";
        // line 16
        echo "        ";
        $context["rouge"] = "rgb(217,83,79)";
        echo " ";
        // line 17
        echo "        ";
        $context["orange"] = "rgb(240,173,78)";
        echo " ";
        // line 18
        echo "        ";
        $context["verte"] = "rgb(75,191,115)";
        echo " ";
        // line 19
        echo "        ";
        $context["padding_left"] = "";
        echo " ";
        // line 20
        echo "
        <div class=\"d-flex float-left\" style=\"width:100%;\">
            <!-- ######################## -->
            <!-- Première colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["premiereColonne"]) || array_key_exists("premiereColonne", $context) ? $context["premiereColonne"] : (function () { throw new Twig_Error_Runtime('Variable "premiereColonne" does not exist.', 28, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 29
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 29, $this->source); })()) + 1);
            // line 30
            echo "
                        ";
            // line 32
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 32, $this->source); })()), "H:i"))) {
                // line 33
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 33, $this->source); })());
                echo " ";
                // line 34
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 34, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 34, $this->source); })()), "H:i")))) {
                // line 35
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 35, $this->source); })());
                echo " ";
                // line 36
                echo "                        ";
            } else {
                // line 37
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 37, $this->source); })());
                echo " ";
                // line 38
                echo "                        ";
            }
            // line 39
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 40, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Deuxieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deuxiemeColonne"]) || array_key_exists("deuxiemeColonne", $context) ? $context["deuxiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "deuxiemeColonne" does not exist.', 56, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 57
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 57, $this->source); })()) + 1);
            // line 58
            echo "
                         ";
            // line 60
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 60, $this->source); })()), "H:i"))) {
                // line 61
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 61, $this->source); })());
                echo " ";
                // line 62
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 62, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 62, $this->source); })()), "H:i")))) {
                // line 63
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 63, $this->source); })());
                echo " ";
                // line 64
                echo "                        ";
            } else {
                // line 65
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 65, $this->source); })());
                echo " ";
                // line 66
                echo "                        ";
            }
            // line 67
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 68, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                </div>
            </div>

            <!-- ######################## -->
            <!-- Troisieme colonne affiché -->
            <!-- ######################## -->

            <div class=\"d-flex w-100\">
                <div class=\"colonne d-flex flex-column\">
                    ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["troisiemeColonne"]) || array_key_exists("troisiemeColonne", $context) ? $context["troisiemeColonne"] : (function () { throw new Twig_Error_Runtime('Variable "troisiemeColonne" does not exist.', 84, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 85
            echo "                        ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 85, $this->source); })()) + 1);
            // line 86
            echo "
                         ";
            // line 88
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 88, $this->source); })()), "H:i"))) {
                // line 89
                echo "                            ";
                $context["couleurBackground"] = (isset($context["rouge"]) || array_key_exists("rouge", $context) ? $context["rouge"] : (function () { throw new Twig_Error_Runtime('Variable "rouge" does not exist.', 89, $this->source); })());
                echo " ";
                // line 90
                echo "                        ";
            } elseif (((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) >= twig_get_attribute($this->env, $this->source, $context["present"], "orange", array())) || (twig_date_format_filter($this->env, (isset($context["minute15"]) || array_key_exists("minute15", $context) ? $context["minute15"] : (function () { throw new Twig_Error_Runtime('Variable "minute15" does not exist.', 90, $this->source); })()), "H:i") > twig_date_format_filter($this->env, (isset($context["tempsMinimums"]) || array_key_exists("tempsMinimums", $context) ? $context["tempsMinimums"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimums" does not exist.', 90, $this->source); })()), "H:i")))) {
                // line 91
                echo "                            ";
                $context["couleurBackground"] = (isset($context["orange"]) || array_key_exists("orange", $context) ? $context["orange"] : (function () { throw new Twig_Error_Runtime('Variable "orange" does not exist.', 91, $this->source); })());
                echo " ";
                // line 92
                echo "                        ";
            } else {
                // line 93
                echo "                            ";
                $context["couleurBackground"] = (isset($context["verte"]) || array_key_exists("verte", $context) ? $context["verte"] : (function () { throw new Twig_Error_Runtime('Variable "verte" does not exist.', 93, $this->source); })());
                echo " ";
                // line 94
                echo "                        ";
            }
            // line 95
            echo "
                        <div class=\"div_etudiant d-flex align-items-center pl-2 pr-3 mb-2 mr-2\" style=\"background-color:";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["couleurBackground"]) || array_key_exists("couleurBackground", $context) ? $context["couleurBackground"] : (function () { throw new Twig_Error_Runtime('Variable "couleurBackground" does not exist.', 96, $this->source); })()), "html", null, true);
            echo ";\">
                            <div class=\"contenant_photo\"><img src=\"data:image/png;base64, ";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "photo", array()), "html", null, true);
            echo "\" alt=\"Phot\"></div>
                            <div class=\"pl-3 flex-grow-1\" style=\"white-space: nowrap;overflow: hidden;text-overflow: ellipsis;\">";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                            <div class=\"mr-1 ml-2\">";
            // line 99
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                </div>
            </div>
        </div>

        ";
        // line 108
        echo "
        ";
        // line 109
        if (((isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 109, $this->source); })()) == 0)) {
            // line 110
            echo "            <div id=\"noStudent\">AUCUN ETUDIANT</div>
        ";
        }
        // line 112
        echo "
        <div class=\"mon_footer d-flex justify-content-between align-items-center fixed-bottom mr-5\" style=\"margin-bottom:-25px\">
            <div> 
                <iframe src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=medium&timezone=Europe%2FParis\" width=\"100%\" height=\"115\" frameborder=\"0\" seamless></iframe> 
            </div>
            <div style=\"font-size:230%\">
                ";
        // line 118
        echo twig_escape_filter($this->env, (isset($context["tailleDuTableauPresent"]) || array_key_exists("tailleDuTableauPresent", $context) ? $context["tailleDuTableauPresent"] : (function () { throw new Twig_Error_Runtime('Variable "tailleDuTableauPresent" does not exist.', 118, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 118, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 125
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 126
        echo "
    <script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("javascript/script.js"), "html", null, true);
        echo "\"></script>

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
        return array (  364 => 127,  361 => 126,  355 => 125,  340 => 118,  332 => 112,  328 => 110,  326 => 109,  323 => 108,  317 => 103,  307 => 99,  301 => 98,  297 => 97,  293 => 96,  290 => 95,  287 => 94,  283 => 93,  280 => 92,  276 => 91,  273 => 90,  269 => 89,  266 => 88,  263 => 86,  260 => 85,  256 => 84,  245 => 75,  235 => 71,  229 => 70,  225 => 69,  221 => 68,  218 => 67,  215 => 66,  211 => 65,  208 => 64,  204 => 63,  201 => 62,  197 => 61,  194 => 60,  191 => 58,  188 => 57,  184 => 56,  173 => 47,  163 => 43,  157 => 42,  153 => 41,  149 => 40,  146 => 39,  143 => 38,  139 => 37,  136 => 36,  132 => 35,  129 => 34,  125 => 33,  122 => 32,  119 => 30,  116 => 29,  112 => 28,  102 => 20,  98 => 19,  94 => 18,  90 => 17,  86 => 16,  82 => 15,  79 => 14,  75 => 12,  69 => 11,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block stylesheets %}

    <link rel=\"stylesheet\" href=\"/css/style.css\">

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

    <script src=\"{{ asset('javascript/script.js') }}\"></script>

{% endblock %}
", "controlleur_affichage/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_affichage/listeEtudiantPresent.html.twig");
    }
}

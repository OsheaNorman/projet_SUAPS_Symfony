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
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tablePresents"]) || array_key_exists("tablePresents", $context) ? $context["tablePresents"] : (function () { throw new Twig_Error_Runtime('Variable "tablePresents" does not exist.', 11, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["present"]) {
            // line 12
            echo "            ";
            $context["compteur"] = ((isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 12, $this->source); })()) + 1);
            // line 13
            echo "            ";
            $context["idSeance"] = twig_get_attribute($this->env, $this->source, $context["present"], "idSeance", array());
            // line 14
            echo "
            ";
            // line 16
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_date_format_filter($this->env, (isset($context["tempsMinimum"]) || array_key_exists("tempsMinimum", $context) ? $context["tempsMinimum"] : (function () { throw new Twig_Error_Runtime('Variable "tempsMinimum" does not exist.', 16, $this->source); })()), "H:i:s"))) {
                // line 17
                echo "                ";
                $context["couleur"] = "#FF0000";
                echo " ";
                // line 18
                echo "            ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()) > twig_get_attribute($this->env, $this->source, $context["present"], "orange", array()))) {
                // line 19
                echo "                ";
                $context["couleur"] = "#CCCC00";
                echo " ";
                // line 20
                echo "            ";
            } else {
                // line 21
                echo "                ";
                $context["couleur"] = "#00BB00";
                echo " ";
                // line 22
                echo "            ";
            }
            // line 23
            echo "
            <div class=\"d-flex float-left\" style=\"width:33%; height: 60px;\">
                <div class=\"d-flex align-items-center m-1 pl-2 pr-2 w-100 rounded\" style=\"background-color:#E6E6E6;\">
                    <div class=\"flex-grow-1\" style=\"color:";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 26, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 26, $this->source); })()), "html", null, true);
            echo "</div>
                    <div class=\"flex-grow-1\" style=\"color:";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 27, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                    <div class=\"flex-grow-1\" style=\"color:";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 28, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                    <div><span class=\"badge p-2\" style=\"color:white; background-color:";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 29, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</span></div>
                </div>
            </div>

        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "            <div class=\"col-lg-12 alert alert-danger\" style=\"border:2px solid black\">NO STUDENTS</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe style=\"color:black\" src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <!--<div id=\"div_horloge\" class=\"col-lg-2 alert alert-success\" style=\"border:2px solid black\"></div>-->
            <div style=\"color:#181907; font-size:50px\">
                ";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 43, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 43, $this->source); })()), "html", null, true);
        echo "
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 51
        echo "
    <script type=\"text/javascript\">

        /* ****** Gestion de l'heure actuelle ****** */
        window.onload=function()
        {
            horloge('div_horloge');
        };

        function horloge(id) {
            if(typeof id==\"string\") { 
                id = document.getElementById(id);
            }
        
            function actualiser() {
                var date = new Date();
                var str = date.getHours();
                str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
                str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
                id.innerHTML = str;
            }
        
            actualiser();
            setInterval(actualiser,1000);
        }

    </script>

    <script>
        var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;

        var conteneurPrincipale = document.getElementById(\"conteneurPrincipale\");
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
        return array (  182 => 51,  176 => 50,  161 => 43,  152 => 36,  145 => 34,  133 => 29,  127 => 28,  121 => 27,  115 => 26,  110 => 23,  107 => 22,  103 => 21,  100 => 20,  96 => 19,  93 => 18,  89 => 17,  86 => 16,  83 => 14,  80 => 13,  77 => 12,  72 => 11,  69 => 10,  65 => 9,  62 => 8,  58 => 6,  52 => 5,  40 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block body %}

    <div id=\"conteneurPrincipale\" class=\"container-fluid pt-3 text-left text-capitalize\">
        {% set compteur = 0 %} {# compteur mis à jour lors du badgeage et du debageage #}
        {% set couleur = '' %} {# variable contenant la couleur lorsque le temps de la séance d'un étudiant est dépassé #}

        {% for present in tablePresents %}
            {% set compteur = compteur + 1 %}
            {% set idSeance = present.idSeance %}

            {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
            {% if present.duree > tempsMinimum|date('H:i:s') %}
                {% set couleur = '#FF0000' %} {# rouge #}
            {% elseif present.duree > present.orange %}
                {% set couleur = '#CCCC00' %} {# orange #}
            {% else %}
                {% set couleur = '#00BB00' %} {# vert #}
            {% endif %}

            <div class=\"d-flex float-left\" style=\"width:33%; height: 60px;\">
                <div class=\"d-flex align-items-center m-1 pl-2 pr-2 w-100 rounded\" style=\"background-color:#E6E6E6;\">
                    <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ compteur }}</div>
                    <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.nom }}</div>
                    <div class=\"flex-grow-1\" style=\"color:{{ couleur }}\">{{ present.prenom }}</div>
                    <div><span class=\"badge p-2\" style=\"color:white; background-color:{{ couleur }}\">{{ present.duree }}</span></div>
                </div>
            </div>

        {% else %}
            <div class=\"col-lg-12 alert alert-danger\" style=\"border:2px solid black\">NO STUDENTS</div>
        {% endfor %}

        <div class=\"d-flex d-flex justify-content-between align-items-center fixed-bottom ml-1 mr-5\">
            <div> 
                <iframe style=\"color:black\" src=\"https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=large&timezone=Europe%2FParis\" width=\"100%\" height=\"130\" frameborder=\"0\" seamless></iframe> 
            </div>
            <!--<div id=\"div_horloge\" class=\"col-lg-2 alert alert-success\" style=\"border:2px solid black\"></div>-->
            <div style=\"color:#181907; font-size:50px\">
                {{ compteur }} / {{ capacite }}
            </div>
        </div>
    </div>

{% endblock %}

{% block javascripts %}

    <script type=\"text/javascript\">

        /* ****** Gestion de l'heure actuelle ****** */
        window.onload=function()
        {
            horloge('div_horloge');
        };

        function horloge(id) {
            if(typeof id==\"string\") { 
                id = document.getElementById(id);
            }
        
            function actualiser() {
                var date = new Date();
                var str = date.getHours();
                str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
                str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
                id.innerHTML = str;
            }
        
            actualiser();
            setInterval(actualiser,1000);
        }

    </script>

    <script>
        var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;

        var conteneurPrincipale = document.getElementById(\"conteneurPrincipale\");
        conteneurPrincipale.style.height = h + \"px\";
        //conteneurPrincipale.style.height = \"1079px\";
    </script>
    
{% endblock %}
", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

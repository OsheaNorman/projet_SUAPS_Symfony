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
    <div class=\"container-fluid text-center\">
        ";
        // line 8
        $context["compteur"] = 0;
        // line 9
        echo "        ";
        $context["couleur"] = "";
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
                $context["couleur"] = "alert alert-danger";
                // line 18
                echo "            ";
            } else {
                // line 19
                echo "                ";
                $context["couleur"] = "alert alert-success";
                // line 20
                echo "            ";
            }
            // line 21
            echo "
            <div class=\"row\" style=\"margin-top:10px\">
                <div class=\"col-lg-1 ";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 23, $this->source); })()), "html", null, true);
            echo "\" style=\"border:2px solid black\">";
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 23, $this->source); })()), "html", null, true);
            echo "</div>
                <div class=\"col-lg-8 offset-lg-1\">
                    <div class=\"row justify-content-around ";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 25, $this->source); })()), "html", null, true);
            echo "\" style=\"border:2px solid black\">
                        <div class=\"col-lg-4\">";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                        <div class=\"col-lg-4\">";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                    </div>
                </div>  
                <div class=\"col-lg-1 offset-lg-1 ";
            // line 30
            echo twig_escape_filter($this->env, (isset($context["couleur"]) || array_key_exists("couleur", $context) ? $context["couleur"] : (function () { throw new Twig_Error_Runtime('Variable "couleur" does not exist.', 30, $this->source); })()), "html", null, true);
            echo "\" style=\"border:2px solid black\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</div>
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
        <footer class=\"row fixed-bottom\" style=\"margin-left:20px; margin-right:20px\">
            <div id=\"div_horloge\" class=\"col-lg-2 alert alert-success\" style=\"border:2px solid black\"></div>
            <div class=\"col-lg-2 offset-lg-8 alert alert-success\" style=\"border:2px solid black\">Capacite : ";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 39, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["capacite"]) || array_key_exists("capacite", $context) ? $context["capacite"] : (function () { throw new Twig_Error_Runtime('Variable "capacite" does not exist.', 39, $this->source); })()), "html", null, true);
        echo "</div>
        </footer>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 45
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 46
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
        return array (  167 => 46,  161 => 45,  147 => 39,  142 => 36,  135 => 34,  124 => 30,  118 => 27,  114 => 26,  110 => 25,  103 => 23,  99 => 21,  96 => 20,  93 => 19,  90 => 18,  87 => 17,  84 => 16,  81 => 14,  78 => 13,  75 => 12,  70 => 11,  67 => 10,  64 => 9,  62 => 8,  58 => 6,  52 => 5,  40 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block body %}

    <div class=\"container-fluid text-center\">
        {% set compteur = 0 %}
        {% set couleur = '' %}

        {% for present in tablePresents %}
            {% set compteur = compteur + 1 %}
            {% set idSeance = present.idSeance %}

            {# Changement de couleur lorsque l'étudiant dépasse le temps minimum de la séance #}
            {% if present.duree > tempsMinimum|date('H:i:s') %}
                {% set couleur = 'alert alert-danger' %}
            {% else %}
                {% set couleur = 'alert alert-success' %}
            {% endif %}

            <div class=\"row\" style=\"margin-top:10px\">
                <div class=\"col-lg-1 {{ couleur }}\" style=\"border:2px solid black\">{{ compteur }}</div>
                <div class=\"col-lg-8 offset-lg-1\">
                    <div class=\"row justify-content-around {{ couleur }}\" style=\"border:2px solid black\">
                        <div class=\"col-lg-4\">{{ present.nom }}</div>
                        <div class=\"col-lg-4\">{{ present.prenom }}</div>
                    </div>
                </div>  
                <div class=\"col-lg-1 offset-lg-1 {{ couleur }}\" style=\"border:2px solid black\">{{ present.duree }}</div>
            </div>

        {% else %}
            <div class=\"col-lg-12 alert alert-danger\" style=\"border:2px solid black\">NO STUDENTS</div>
        {% endfor %}

        <footer class=\"row fixed-bottom\" style=\"margin-left:20px; margin-right:20px\">
            <div id=\"div_horloge\" class=\"col-lg-2 alert alert-success\" style=\"border:2px solid black\"></div>
            <div class=\"col-lg-2 offset-lg-8 alert alert-success\" style=\"border:2px solid black\">Capacite : {{ compteur }} / {{ capacite }}</div>
        </footer>
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
    
{% endblock %}
", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

<?php

/* controlleur_statistiques/index.html.twig */
class __TwigTemplate_20b0526b9bd86ce8cefd0729cb6f21b3c3f0ecfca42fc20980f6dc7600f6ddaa extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "controlleur_statistiques/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlleur_statistiques/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Hello !";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<div>
   <span><strong>Statistiques sur les badgeages</strong></span>
    <br /><br />
   <form>
        <input id=\"date\" placeholder=\"2018-11-09\" type=\"text\" value=\"\"/>
        <input id=\"nom\" placeholder=\"Nom\" type=\"text\" value=\"\"/>
        <br /> <br />
        <input id=\"from\" type=\"text\" placeholder=\"from ex : 2018-11-09 10:25:00\" value=\"\"/>
        <input id=\"to\" type=\"text\" placeholder=\"to ex : 2018-11-09 10:25:00\" value=\"\"/>
        <br /><br />
        <input type=\"button\" value=\"Par jour\" onclick=\"badgeagesJour()\"/>
        <input type=\"button\" value=\"Par nom\" onclick=\"badgeagesNom()\"/>
        <input type=\"button\" value=\"Par tranche horaire\" onclick=\"badgeagesTranche()\"/>
   </form>
   <br /><br />
</div>
<div>
    <span><strong>Résultat</strong></span>
    <div>
        ";
        // line 26
        if (((isset($context["nb_badgeages"]) || array_key_exists("nb_badgeages", $context) ? $context["nb_badgeages"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages" does not exist.', 26, $this->source); })()) != 0)) {
            // line 27
            echo "        <p>
            Le nombre de badgeages pour ce jour : ";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["nb_badgeages"]) || array_key_exists("nb_badgeages", $context) ? $context["nb_badgeages"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages" does not exist.', 28, $this->source); })()), "html", null, true);
            echo "
        </p>
        ";
        } else {
            // line 31
            echo "
        ";
        }
        // line 33
        echo "    </div>
</div>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 39
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 40
        echo "<script>
    function badgeagesJour() {
        jour = document.getElementById(\"date\").value;
        if (jour == \"\") {
            alert(\"La date est requise\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/jour/\" + jour;
        window.location = url;
    }
    function badgeagesNom() {
        nom = document.getElementById(\"nom\").value;
        if (nom == \"\") {
            alert(\"Le nom est requis\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/personne/\" + nom;
        window.location = url;
    }
    function badgeagesTranche() {
        alert(\"Tranche clicked\");
    }
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "controlleur_statistiques/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 40,  106 => 39,  95 => 33,  91 => 31,  85 => 28,  82 => 27,  80 => 26,  58 => 6,  52 => 5,  40 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}Hello !{% endblock %}

{% block body %}

<div>
   <span><strong>Statistiques sur les badgeages</strong></span>
    <br /><br />
   <form>
        <input id=\"date\" placeholder=\"2018-11-09\" type=\"text\" value=\"\"/>
        <input id=\"nom\" placeholder=\"Nom\" type=\"text\" value=\"\"/>
        <br /> <br />
        <input id=\"from\" type=\"text\" placeholder=\"from ex : 2018-11-09 10:25:00\" value=\"\"/>
        <input id=\"to\" type=\"text\" placeholder=\"to ex : 2018-11-09 10:25:00\" value=\"\"/>
        <br /><br />
        <input type=\"button\" value=\"Par jour\" onclick=\"badgeagesJour()\"/>
        <input type=\"button\" value=\"Par nom\" onclick=\"badgeagesNom()\"/>
        <input type=\"button\" value=\"Par tranche horaire\" onclick=\"badgeagesTranche()\"/>
   </form>
   <br /><br />
</div>
<div>
    <span><strong>Résultat</strong></span>
    <div>
        {% if nb_badgeages != 0 %}
        <p>
            Le nombre de badgeages pour ce jour : {{ nb_badgeages }}
        </p>
        {% else %}

        {% endif %}
    </div>
</div>


{% endblock %}

{% block javascripts %}
<script>
    function badgeagesJour() {
        jour = document.getElementById(\"date\").value;
        if (jour == \"\") {
            alert(\"La date est requise\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/jour/\" + jour;
        window.location = url;
    }
    function badgeagesNom() {
        nom = document.getElementById(\"nom\").value;
        if (nom == \"\") {
            alert(\"Le nom est requis\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/personne/\" + nom;
        window.location = url;
    }
    function badgeagesTranche() {
        alert(\"Tranche clicked\");
    }
</script>
{% endblock %}
", "controlleur_statistiques/index.html.twig", "/home/etudiant/Bureau/projet_SUAPS_Symfony/templates/controlleur_statistiques/index.html.twig");
    }
}

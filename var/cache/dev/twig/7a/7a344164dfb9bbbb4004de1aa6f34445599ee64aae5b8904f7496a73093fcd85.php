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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlleur_statistiques/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Statistiques";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "<style>
.column {
    margin-right: 10px;
}
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 14
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
        // line 34
        if (((isset($context["nb_badgeages_par_jour"]) || array_key_exists("nb_badgeages_par_jour", $context) ? $context["nb_badgeages_par_jour"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_jour" does not exist.', 34, $this->source); })()) != 0)) {
            // line 35
            echo "            <p>
                Le nombre de badgeages pour ce jour : ";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["nb_badgeages_par_jour"]) || array_key_exists("nb_badgeages_par_jour", $context) ? $context["nb_badgeages_par_jour"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_jour" does not exist.', 36, $this->source); })()), "html", null, true);
            echo "
            </p>
            ";
        } elseif ((        // line 38
(isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 38, $this->source); })()) != 0)) {
            // line 39
            echo "                <p>
                    <span>Total : ";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 40, $this->source); })()), "html", null, true);
            echo "</span>
                    <table>
                        <tr>
                            <th class=\"column\">idSeance</th>
                            <th class=\"column\">no_mifare_inverse</th>
                            <th class=\"column\">temps</th>
                            <th class=\"column\">entreesSorties</th>
                        </tr>
                        ";
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ((isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 48, $this->source); })()) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 49
                echo "                            <tr>
                                <td class=\"column\">";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 50, $this->source); })()), $context["i"], array(), "array"), "idSeance", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 51, $this->source); })()), $context["i"], array(), "array"), "no_mifare_inverse", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 52, $this->source); })()), $context["i"], array(), "array"), "temps", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 53, $this->source); })()), $context["i"], array(), "array"), "entreesSorties", array(), "array"), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "                    </table>
                </p>
            ";
        } elseif ((        // line 58
(isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 58, $this->source); })()) != 0)) {
            // line 59
            echo "                <p>
                    <span>Total : ";
            // line 60
            echo twig_escape_filter($this->env, (isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 60, $this->source); })()), "html", null, true);
            echo "</span>
                    <table>
                        <tr>
                            <th class=\"column\">idSeance</th>
                            <th class=\"column\">no_mifare_inverse</th>
                            <th class=\"column\">temps</th>
                            <th class=\"column\">entreesSorties</th>
                        </tr>
                        ";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ((isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 68, $this->source); })()) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 69
                echo "                            <tr>
                                <td class=\"column\">";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 70, $this->source); })()), $context["i"], array(), "array"), "idSeance", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 71
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 71, $this->source); })()), $context["i"], array(), "array"), "no_mifare_inverse", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 72, $this->source); })()), $context["i"], array(), "array"), "temps", array(), "array"), "html", null, true);
                echo "</td>
                                <td class=\"column\">";
                // line 73
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 73, $this->source); })()), $context["i"], array(), "array"), "entreesSorties", array(), "array"), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                    </table>
                </p>
        ";
        }
        // line 79
        echo "    </div>
</div>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 85
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 86
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
        from = document.getElementById(\"from\").value;
        to = document.getElementById(\"to\").value;
        if ((from == \"\") || (to == \"\")) {
            alert(\"Renseigner le début et la fin d'une tranche horaire\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/tranche/\" + from + \"/\" + to;
        window.location = url;
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
        return array (  223 => 86,  217 => 85,  206 => 79,  201 => 76,  192 => 73,  188 => 72,  184 => 71,  180 => 70,  177 => 69,  173 => 68,  162 => 60,  159 => 59,  157 => 58,  153 => 56,  144 => 53,  140 => 52,  136 => 51,  132 => 50,  129 => 49,  125 => 48,  114 => 40,  111 => 39,  109 => 38,  104 => 36,  101 => 35,  99 => 34,  77 => 14,  71 => 13,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}Statistiques{% endblock %}

{% block stylesheets %}
<style>
.column {
    margin-right: 10px;
}
</style>
{% endblock %}

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
        {% if nb_badgeages_par_jour != 0 %}
            <p>
                Le nombre de badgeages pour ce jour : {{ nb_badgeages_par_jour }}
            </p>
            {% elseif count_nb_badgeages_par_nom != 0 %}
                <p>
                    <span>Total : {{ count_nb_badgeages_par_nom }}</span>
                    <table>
                        <tr>
                            <th class=\"column\">idSeance</th>
                            <th class=\"column\">no_mifare_inverse</th>
                            <th class=\"column\">temps</th>
                            <th class=\"column\">entreesSorties</th>
                        </tr>
                        {% for i in 0..(count_nb_badgeages_par_nom -1) %}
                            <tr>
                                <td class=\"column\">{{ nb_badgeages_par_nom[i][\"idSeance\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_nom[i][\"no_mifare_inverse\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_nom[i][\"temps\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_nom[i][\"entreesSorties\"]}}</td>
                            </tr>
                        {% endfor %}
                    </table>
                </p>
            {% elseif count_nb_badgeages_par_tranche != 0 %}
                <p>
                    <span>Total : {{ count_nb_badgeages_par_tranche }}</span>
                    <table>
                        <tr>
                            <th class=\"column\">idSeance</th>
                            <th class=\"column\">no_mifare_inverse</th>
                            <th class=\"column\">temps</th>
                            <th class=\"column\">entreesSorties</th>
                        </tr>
                        {% for i in 0..(count_nb_badgeages_par_tranche -1) %}
                            <tr>
                                <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"idSeance\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"no_mifare_inverse\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"temps\"]}}</td>
                                <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"entreesSorties\"]}}</td>
                            </tr>
                        {% endfor %}
                    </table>
                </p>
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
        from = document.getElementById(\"from\").value;
        to = document.getElementById(\"to\").value;
        if ((from == \"\") || (to == \"\")) {
            alert(\"Renseigner le début et la fin d'une tranche horaire\");
            return;
        }
        var url = \"/controlleur/statistiques/badgeages/tranche/\" + from + \"/\" + to;
        window.location = url;
    }
</script>
{% endblock %}
", "controlleur_statistiques/index.html.twig", "/home/etudiant/Bureau/projet_SUAPS_Symfony/templates/controlleur_statistiques/index.html.twig");
    }
}

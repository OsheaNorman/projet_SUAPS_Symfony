<?php

/* controlleur_statistiques/statistiques.html.twig */
class __TwigTemplate_190a641ded0b170d9903e2e90a00b54bce44e02c091c94e7b3c781bc6dba1533 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "controlleur_statistiques/statistiques.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "controlleur_statistiques/statistiques.html.twig"));

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
    .titre {
        font-size: 25px;
    }
    .column {
        margin-right: 10px;
    }
    table {
        margin: 0 auto;
    }
    table tr th td {
        margin-right: 10px;
        border: 1px solid black;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 24
        echo "
<div style=\"margin: 0 auto;\">
   <span class=\"titre\"><strong>Statistiques sur les badgeages</strong></span>
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

    <div>
        <span class=\"titre\"><strong>Résultat</strong></span>
        <div>
            ";
        // line 44
        if (((isset($context["nb_badgeages_par_jour"]) || array_key_exists("nb_badgeages_par_jour", $context) ? $context["nb_badgeages_par_jour"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_jour" does not exist.', 44, $this->source); })()) != 0)) {
            // line 45
            echo "                <p>
                    Le nombre de badgeages pour ce jour : ";
            // line 46
            echo twig_escape_filter($this->env, (isset($context["nb_badgeages_par_jour"]) || array_key_exists("nb_badgeages_par_jour", $context) ? $context["nb_badgeages_par_jour"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_jour" does not exist.', 46, $this->source); })()), "html", null, true);
            echo "
                </p>
                ";
        } elseif ((        // line 48
(isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 48, $this->source); })()) != 0)) {
            // line 49
            echo "                    <p>
                        <span>Total : ";
            // line 50
            echo twig_escape_filter($this->env, (isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 50, $this->source); })()), "html", null, true);
            echo "</span>
                        <table id=\"table\">
                            <thead>
                                <tr>
                                    <th class=\"column\">idSeance</th>
                                    <th class=\"column\">no_mifare_inverse</th>
                                    <th class=\"column\">temps</th>
                                    <th class=\"column\">entreesSorties</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ((isset($context["count_nb_badgeages_par_nom"]) || array_key_exists("count_nb_badgeages_par_nom", $context) ? $context["count_nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_nom" does not exist.', 61, $this->source); })()) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 62
                echo "                                    <tr>
                                        <td class=\"column\">";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 63, $this->source); })()), $context["i"], array(), "array"), "idSeance", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 64, $this->source); })()), $context["i"], array(), "array"), "no_mifare_inverse", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 65, $this->source); })()), $context["i"], array(), "array"), "temps", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_nom"]) || array_key_exists("nb_badgeages_par_nom", $context) ? $context["nb_badgeages_par_nom"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_nom" does not exist.', 66, $this->source); })()), $context["i"], array(), "array"), "entreesSorties", array(), "array"), "html", null, true);
                echo "</td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "                            </tbody>
                        </table>
                    </p>
                ";
        } elseif ((        // line 72
(isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 72, $this->source); })()) != 0)) {
            // line 73
            echo "                    <p>
                        <span>Total : ";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 74, $this->source); })()), "html", null, true);
            echo "</span>
                        <table>
                            <thead>
                                <tr>
                                    <th class=\"column\">idSeance</th>
                                    <th class=\"column\">no_mifare_inverse</th>
                                    <th class=\"column\">temps</th>
                                    <th class=\"column\">entreesSorties</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ((isset($context["count_nb_badgeages_par_tranche"]) || array_key_exists("count_nb_badgeages_par_tranche", $context) ? $context["count_nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "count_nb_badgeages_par_tranche" does not exist.', 85, $this->source); })()) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 86
                echo "                                    <tr>
                                        <td class=\"column\">";
                // line 87
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 87, $this->source); })()), $context["i"], array(), "array"), "idSeance", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 88
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 88, $this->source); })()), $context["i"], array(), "array"), "no_mifare_inverse", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 89
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 89, $this->source); })()), $context["i"], array(), "array"), "temps", array(), "array"), "html", null, true);
                echo "</td>
                                        <td class=\"column\">";
                // line 90
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["nb_badgeages_par_tranche"]) || array_key_exists("nb_badgeages_par_tranche", $context) ? $context["nb_badgeages_par_tranche"] : (function () { throw new Twig_Error_Runtime('Variable "nb_badgeages_par_tranche" does not exist.', 90, $this->source); })()), $context["i"], array(), "array"), "entreesSorties", array(), "array"), "html", null, true);
                echo "</td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            echo "                            </tbody>
                        </table>
                    </p>
            ";
        }
        // line 97
        echo "        </div>
    </div>

</div>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 105
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 106
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
        return "controlleur_statistiques/statistiques.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 106,  237 => 105,  224 => 97,  218 => 93,  209 => 90,  205 => 89,  201 => 88,  197 => 87,  194 => 86,  190 => 85,  176 => 74,  173 => 73,  171 => 72,  166 => 69,  157 => 66,  153 => 65,  149 => 64,  145 => 63,  142 => 62,  138 => 61,  124 => 50,  121 => 49,  119 => 48,  114 => 46,  111 => 45,  109 => 44,  87 => 24,  81 => 23,  59 => 6,  53 => 5,  41 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}Statistiques{% endblock %}

{% block stylesheets %}
<style>
    .titre {
        font-size: 25px;
    }
    .column {
        margin-right: 10px;
    }
    table {
        margin: 0 auto;
    }
    table tr th td {
        margin-right: 10px;
        border: 1px solid black;
    }
</style>
{% endblock %}

{% block body %}

<div style=\"margin: 0 auto;\">
   <span class=\"titre\"><strong>Statistiques sur les badgeages</strong></span>
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

    <div>
        <span class=\"titre\"><strong>Résultat</strong></span>
        <div>
            {% if nb_badgeages_par_jour != 0 %}
                <p>
                    Le nombre de badgeages pour ce jour : {{ nb_badgeages_par_jour }}
                </p>
                {% elseif count_nb_badgeages_par_nom != 0 %}
                    <p>
                        <span>Total : {{ count_nb_badgeages_par_nom }}</span>
                        <table id=\"table\">
                            <thead>
                                <tr>
                                    <th class=\"column\">idSeance</th>
                                    <th class=\"column\">no_mifare_inverse</th>
                                    <th class=\"column\">temps</th>
                                    <th class=\"column\">entreesSorties</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for i in 0..(count_nb_badgeages_par_nom -1) %}
                                    <tr>
                                        <td class=\"column\">{{ nb_badgeages_par_nom[i][\"idSeance\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_nom[i][\"no_mifare_inverse\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_nom[i][\"temps\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_nom[i][\"entreesSorties\"]}}</td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </p>
                {% elseif count_nb_badgeages_par_tranche != 0 %}
                    <p>
                        <span>Total : {{ count_nb_badgeages_par_tranche }}</span>
                        <table>
                            <thead>
                                <tr>
                                    <th class=\"column\">idSeance</th>
                                    <th class=\"column\">no_mifare_inverse</th>
                                    <th class=\"column\">temps</th>
                                    <th class=\"column\">entreesSorties</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for i in 0..(count_nb_badgeages_par_tranche -1) %}
                                    <tr>
                                        <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"idSeance\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"no_mifare_inverse\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"temps\"]}}</td>
                                        <td class=\"column\">{{ nb_badgeages_par_tranche[i][\"entreesSorties\"]}}</td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </p>
            {% endif %}
        </div>
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
", "controlleur_statistiques/statistiques.html.twig", "/home/etudiant/Bureau/projet_SUAPS_Symfony/templates/controlleur_statistiques/statistiques.html.twig");
    }
}

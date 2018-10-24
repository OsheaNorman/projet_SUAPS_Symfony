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
    <div class=\"container\">
        ";
        // line 8
        $context["compteur"] = 0;
        // line 9
        echo "        ";
        $context["idSeance"] = 0;
        // line 10
        echo "
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["presents"]) || array_key_exists("presents", $context) ? $context["presents"] : (function () { throw new Twig_Error_Runtime('Variable "presents" does not exist.', 11, $this->source); })()));
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
            <div class=\"row\" style=\"margin-top:10px\">
                <div class=\"col-lg-1 alert alert-success\" style=\"border:2px solid black\">";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 16, $this->source); })()), "html", null, true);
            echo "</div>
                <div class=\"col-lg-8 offset-lg-1\">
                    <div class=\"row justify-content-around alert alert-success\" style=\"border:2px solid black\">
                        <div class=\"col-lg-4\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "nom", array()), "html", null, true);
            echo "</div>
                        <div class=\"col-lg-4\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "prenom", array()), "html", null, true);
            echo "</div>
                    </div>
                </div>  
                <div class=\"col-lg-1 offset-lg-1 alert alert-success\" style=\"border:2px solid black\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["present"], "duree", array()), "html", null, true);
            echo "</div>
            </div>

        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 27
            echo "            <p>No students</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['present'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
        <footer class=\"row\">
            <div class=\"col-lg-3 alert alert-success\" style=\"border:2px solid black\">
                <div id=\"div_horloge\"></div>
\t 
\t            <script type=\"text/javascript\">
                    window.onload=function()
                    {
                        horloge('div_horloge');
                    };
        
                    function horloge(el) {
                        if(typeof el==\"string\") { 
                            el = document.getElementById(el); 
                        }
                    
                        function actualiser() {
                            var date = new Date();
                            var str = date.getHours();
                            str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
                            str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
                            el.innerHTML = str;
                        }
                    
                        actualiser();
                        setInterval(actualiser,1000);
                    }
                    
                </script>
            </div>

            ";
        // line 60
        $context["nbMax"] = 0;
        // line 61
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["resultLimitePersonnes"]) || array_key_exists("resultLimitePersonnes", $context) ? $context["resultLimitePersonnes"] : (function () { throw new Twig_Error_Runtime('Variable "resultLimitePersonnes" does not exist.', 61, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["limitePersonne"]) {
            // line 62
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["limitePersonne"], "idSeance", array()) == (isset($context["idSeance"]) || array_key_exists("idSeance", $context) ? $context["idSeance"] : (function () { throw new Twig_Error_Runtime('Variable "idSeance" does not exist.', 62, $this->source); })()))) {
                // line 63
                echo "                    ";
                $context["nbMax"] = twig_get_attribute($this->env, $this->source, $context["limitePersonne"], "limitePersonnes", array());
                // line 64
                echo "                ";
            }
            // line 65
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limitePersonne'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
            <div class=\"col-lg-3 offset-lg-6 alert alert-success\" style=\"border:2px solid black\">Capacite : ";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["compteur"]) || array_key_exists("compteur", $context) ? $context["compteur"] : (function () { throw new Twig_Error_Runtime('Variable "compteur" does not exist.', 67, $this->source); })()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, (isset($context["nbMax"]) || array_key_exists("nbMax", $context) ? $context["nbMax"] : (function () { throw new Twig_Error_Runtime('Variable "nbMax" does not exist.', 67, $this->source); })()), "html", null, true);
        echo "</div>
        </footer>
    </div>

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
        return array (  174 => 67,  171 => 66,  165 => 65,  162 => 64,  159 => 63,  156 => 62,  151 => 61,  149 => 60,  116 => 29,  109 => 27,  100 => 23,  94 => 20,  90 => 19,  84 => 16,  80 => 14,  77 => 13,  74 => 12,  69 => 11,  66 => 10,  63 => 9,  61 => 8,  57 => 6,  51 => 5,  39 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}{{ liste_presence }}{% endblock %}

{% block body %}

    <div class=\"container\">
        {% set compteur = 0 %}
        {% set idSeance = 0 %}

        {% for present in presents %}
            {% set compteur = compteur + 1 %}
            {% set idSeance = present.idSeance %}

            <div class=\"row\" style=\"margin-top:10px\">
                <div class=\"col-lg-1 alert alert-success\" style=\"border:2px solid black\">{{ compteur }}</div>
                <div class=\"col-lg-8 offset-lg-1\">
                    <div class=\"row justify-content-around alert alert-success\" style=\"border:2px solid black\">
                        <div class=\"col-lg-4\">{{ present.nom }}</div>
                        <div class=\"col-lg-4\">{{ present.prenom }}</div>
                    </div>
                </div>  
                <div class=\"col-lg-1 offset-lg-1 alert alert-success\" style=\"border:2px solid black\">{{ present.duree }}</div>
            </div>

        {% else %}
            <p>No students</p>
        {% endfor %}

        <footer class=\"row\">
            <div class=\"col-lg-3 alert alert-success\" style=\"border:2px solid black\">
                <div id=\"div_horloge\"></div>
\t 
\t            <script type=\"text/javascript\">
                    window.onload=function()
                    {
                        horloge('div_horloge');
                    };
        
                    function horloge(el) {
                        if(typeof el==\"string\") { 
                            el = document.getElementById(el); 
                        }
                    
                        function actualiser() {
                            var date = new Date();
                            var str = date.getHours();
                            str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
                            str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
                            el.innerHTML = str;
                        }
                    
                        actualiser();
                        setInterval(actualiser,1000);
                    }
                    
                </script>
            </div>

            {% set nbMax = 0 %}
            {% for limitePersonne in resultLimitePersonnes %}
                {% if limitePersonne.idSeance == idSeance %}
                    {% set nbMax = limitePersonne.limitePersonnes %}
                {% endif %}
            {% endfor %}

            <div class=\"col-lg-3 offset-lg-6 alert alert-success\" style=\"border:2px solid black\">Capacite : {{ compteur }} / {{ nbMax }}</div>
        </footer>
    </div>

{% endblock %}", "controlleur_test/listeEtudiantPresent.html.twig", "/home/etudiant/M1/projet/blog/templates/controlleur_test/listeEtudiantPresent.html.twig");
    }
}

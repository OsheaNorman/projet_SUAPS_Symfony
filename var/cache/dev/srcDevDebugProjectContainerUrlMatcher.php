<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): ?array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($pathinfo) {
            default:
                $routes = array(
                    '/controlleur/statistiques/badgeages' => array(array('_route' => 'statistiques_badgeages', '_controller' => 'App\\Controller\\ControlleurStatistiquesController::index'), null, null, null),
                    '/controlleur/test' => array(array('_route' => 'test', '_controller' => 'App\\Controller\\ControlleurTestController::index'), null, null, null),
                    '/controlleur/badgeage' => array(array('_route' => 'badgeage', '_controller' => 'App\\Controller\\ControlleurTestController::badgeage'), null, null, null),
                    '/controlleur/setSeance' => array(array('_route' => 'setSeance', '_controller' => 'App\\Controller\\ControlleurTestController::setSeance'), null, null, null),
                    '/controlleur/sendSeance' => array(array('_route' => 'sendSeance', '_controller' => 'App\\Controller\\ControlleurTestController::sendSeance'), null, null, null),
                    '/controlleur/addPersonne' => array(array('_route' => 'addPersonne', '_controller' => 'App\\Controller\\ControlleurTestController::addPersonne'), null, null, null),
                );

                if (!isset($routes[$pathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes) = $routes[$pathinfo];

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = array(
            0 => '{^(?'
                    .'|/controlleur/(?'
                        .'|statistiques/badgeages/(?'
                            .'|jour/([^/]++)(*:62)'
                            .'|tranche/([^/]++)/([^/]++)(*:94)'
                            .'|personne/([^/]++)(*:118)'
                        .')'
                        .'|vuePresenceUpdate/([^/]++)(*:153)'
                        .'|listePersonne/([^/]++)(*:183)'
                    .')'
                    .'|/api(?'
                        .'|(?:/(index)(?:\\.([^/]++))?)?(*:227)'
                        .'|/(?'
                            .'|docs(?:\\.([^/]++))?(*:258)'
                            .'|contexts/(.+)(?:\\.([^/]++))?(*:294)'
                            .'|vue_presences(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:336)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:374)'
                                .')'
                            .')'
                        .')'
                    .')'
                    .'|/_error/(\\d+)(?:\\.([^/]++))?(*:414)'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    case 336:
                        $matches = array('_format' => $matches[1] ?? null);

                        // api_vue_presences_get_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_vue_presences_get_collection') + $matches, array('_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_collection_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_vue_presences_get_collection;
                        }

                        return $ret;
                        not_api_vue_presences_get_collection:

                        // api_vue_presences_post_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_vue_presences_post_collection') + $matches, array('_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_collection_operation_name' => 'post'));
                        if (!isset(($a = array('POST' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_vue_presences_post_collection;
                        }

                        return $ret;
                        not_api_vue_presences_post_collection:

                        break;
                    case 374:
                        $matches = array('id' => $matches[1] ?? null, '_format' => $matches[2] ?? null);

                        // api_vue_presences_get_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_vue_presences_get_item') + $matches, array('_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_vue_presences_get_item;
                        }

                        return $ret;
                        not_api_vue_presences_get_item:

                        // api_vue_presences_delete_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_vue_presences_delete_item') + $matches, array('_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'delete'));
                        if (!isset(($a = array('DELETE' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_vue_presences_delete_item;
                        }

                        return $ret;
                        not_api_vue_presences_delete_item:

                        // api_vue_presences_put_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_vue_presences_put_item') + $matches, array('_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'put'));
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_vue_presences_put_item;
                        }

                        return $ret;
                        not_api_vue_presences_put_item:

                        break;
                    default:
                        $routes = array(
                            62 => array(array('_route' => 'badgeages_jours', '_controller' => 'App\\Controller\\ControlleurStatistiquesController::badgeagesJour'), array('date'), null, null),
                            94 => array(array('_route' => 'badgeages_tranche_horaire', '_controller' => 'App\\Controller\\ControlleurStatistiquesController::badgeagesTranchesHoraires'), array('heure_debut', 'heure_fin'), null, null),
                            118 => array(array('_route' => 'badgeages_nom', '_controller' => 'App\\Controller\\ControlleurStatistiquesController::badgeagesPersonne'), array('nom'), null, null),
                            153 => array(array('_route' => 'vuePresenceUpdate', '_controller' => 'App\\Controller\\ControlleurTestController::vuePresenceUpdate'), array('no_individu'), null, null),
                            183 => array(array('_route' => 'Liste_etudiant_present', '_controller' => 'App\\Controller\\ControlleurTestController::printScreen'), array('retour'), null, null),
                            227 => array(array('_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => '1', 'index' => 'index'), array('index', '_format'), null, null),
                            258 => array(array('_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_api_respond' => '1', '_format' => ''), array('_format'), null, null),
                            294 => array(array('_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_api_respond' => '1', '_format' => 'jsonld'), array('shortName', '_format'), null, null),
                            414 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes) = $routes[$m];

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (414 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return null;
    }
}

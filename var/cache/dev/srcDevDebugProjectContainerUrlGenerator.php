<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'statistiques_badgeages' => array(array('plage'), array('_controller' => 'App\\Controller\\ControlleurStatistiquesController::index'), array(), array(array('variable', '/', '[^/]++', 'plage'), array('text', '/controlleur/statistiques/badgeages')), array(), array()),
        'badgeages_jours' => array(array('date', 'plage'), array('_controller' => 'App\\Controller\\ControlleurStatistiquesController::badgeagesJour'), array(), array(array('variable', '/', '[^/]++', 'plage'), array('variable', '/', '[^/]++', 'date'), array('text', '/controlleur/statistiques/badgeages/jour')), array(), array()),
        'test' => array(array(), array('_controller' => 'App\\Controller\\ControlleurTestController::index'), array(), array(array('text', '/controlleur/test')), array(), array()),
        'badgeage' => array(array(), array('_controller' => 'App\\Controller\\ControlleurTestController::badgeage'), array(), array(array('text', '/controlleur/badgeage')), array(), array()),
        'vuePresenceUpdate' => array(array('no_individu'), array('_controller' => 'App\\Controller\\ControlleurTestController::vuePresenceUpdate'), array(), array(array('variable', '/', '[^/]++', 'no_individu'), array('text', '/controlleur/vuePresenceUpdate')), array(), array()),
        'setSeance' => array(array(), array('_controller' => 'App\\Controller\\ControlleurTestController::setSeance'), array(), array(array('text', '/controlleur/setSeance')), array(), array()),
        'sendSeance' => array(array(), array('_controller' => 'App\\Controller\\ControlleurTestController::sendSeance'), array(), array(array('text', '/controlleur/sendSeance')), array(), array()),
        'addPersonne' => array(array(), array('_controller' => 'App\\Controller\\ControlleurTestController::addPersonne'), array(), array(array('text', '/controlleur/addPersonne')), array(), array()),
        'Liste_etudiant_present' => array(array('retour'), array('_controller' => 'App\\Controller\\ControlleurTestController::printScreen'), array(), array(array('variable', '/', '[^/]++', 'retour'), array('text', '/controlleur/listePersonne')), array(), array()),
        'api_entrypoint' => array(array('index', '_format'), array('_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => '1', 'index' => 'index'), array('index' => 'index'), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', 'index', 'index'), array('text', '/api')), array(), array()),
        'api_doc' => array(array('_format'), array('_controller' => 'api_platform.action.documentation', '_api_respond' => '1', '_format' => ''), array(), array(array('variable', '.', '[^/]++', '_format'), array('text', '/api/docs')), array(), array()),
        'api_jsonld_context' => array(array('shortName', '_format'), array('_controller' => 'api_platform.jsonld.action.context', '_api_respond' => '1', '_format' => 'jsonld'), array('shortName' => '.+'), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '.+', 'shortName'), array('text', '/api/contexts')), array(), array()),
        'api_vue_presences_get_collection' => array(array('_format'), array('_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_collection_operation_name' => 'get'), array(), array(array('variable', '.', '[^/]++', '_format'), array('text', '/api/vue_presences')), array(), array()),
        'api_vue_presences_post_collection' => array(array('_format'), array('_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_collection_operation_name' => 'post'), array(), array(array('variable', '.', '[^/]++', '_format'), array('text', '/api/vue_presences')), array(), array()),
        'api_vue_presences_get_item' => array(array('id', '_format'), array('_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'get'), array(), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '[^/\\.]++', 'id'), array('text', '/api/vue_presences')), array(), array()),
        'api_vue_presences_delete_item' => array(array('id', '_format'), array('_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'delete'), array(), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '[^/\\.]++', 'id'), array('text', '/api/vue_presences')), array(), array()),
        'api_vue_presences_put_item' => array(array('id', '_format'), array('_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VuePresence', '_api_item_operation_name' => 'put'), array(), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '[^/\\.]++', 'id'), array('text', '/api/vue_presences')), array(), array()),
        '_twig_error_test' => array(array('code', '_format'), array('_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code' => '\\d+'), array(array('variable', '.', '[^/]++', '_format'), array('variable', '/', '\\d+', 'code'), array('text', '/_error')), array(), array()),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && (self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
            unset($parameters['_locale']);
            $name .= '.'.$locale;
        } elseif (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}

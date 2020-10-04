<?php

namespace AnsjTextUnderImage\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Controller_Action;
use Shopware\Components\Plugin\ConfigReader;

class RouteSubscriber implements SubscriberInterface
{

    private $pluginDirectory;
    /**
     * @var array
     */
    private $config;

    public function __construct($pluginName, $pluginDirectory, ConfigReader $configReader)
    {
        $this->pluginDirectory = $pluginDirectory;

        $this->config = $configReader->getByPluginName($pluginName);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatch'
        ];
    }

    public function onPostDispatch(\Enlight_Controller_ActionEventArgs $args)
    {
        /** @var Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $view = $controller->View();

        if ($this->config['ansjEnabled'] && $this->config['ansjText'] && $this->config['ansjFont'] ) {
            $view->assign('ansjEnabled', $this->config['ansjEnabled']);
            $view->assign('ansjText', $this->config['ansjText']);
            $view->assign('ansjFont', $this->config['ansjFont']);
        }

        $view->addTemplateDir($this->pluginDirectory . '/Resources/views');

    }

}

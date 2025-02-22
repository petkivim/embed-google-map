<?php

defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Joomla\Plugin\Content\EmbedGoogleMap\Extension\EmbedGoogleMap;

    return new class() implements ServiceProviderInterface
    {
        public function register(Container $container)
        {
            $container->set(
                PluginInterface::class,
                function (Container $container) {
    
                    $config = (array) PluginHelper::getPlugin('content', 'embed_google_map');
                    $subject = $container->get(DispatcherInterface::class);
                    $app = Factory::getApplication();
                    
                    $plugin = new EmbedGoogleMap($subject, $config);
                    $plugin->setApplication($app);
                    //$plugin->setDatabase($container->get(DatabaseInterface::class));
    
                    return $plugin;
                }
            );
        }
    };
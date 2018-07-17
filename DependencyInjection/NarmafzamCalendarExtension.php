<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\DependencyInjection;

use Narmafzam\FullCalenderBundle\DependencyInjection\Interfaces\NarmafzamCalenderExtensionInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Class NarmafzamCalendarExtension
 * @package Narmafzam\FullCalenderBundle\DependencyInjection
 */
class NarmafzamCalendarExtension extends Extension implements NarmafzamCalenderExtensionInterface
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
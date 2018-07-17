<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\DependencyInjection;

use Narmafzam\FullCalenderBundle\DependencyInjection\Interfaces\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration
 * @package Narmafzam\FullCalenderBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('farshadi_73_calender');

        return $treeBuilder;
    }
}
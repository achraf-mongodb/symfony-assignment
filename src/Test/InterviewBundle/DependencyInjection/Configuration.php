<?php

namespace Test\InterviewBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('test_interview');

        $rootNode
            ->children()
                ->scalarNode('ping')->defaultNull()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

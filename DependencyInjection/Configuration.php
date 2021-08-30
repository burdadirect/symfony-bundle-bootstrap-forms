<?php

namespace HBM\BootstrapFormBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder() {
    $treeBuilder = new TreeBuilder('hbm_bootstrap_form');

    if (method_exists($treeBuilder, 'getRootNode')) {
      $rootNode = $treeBuilder->getRootNode();
    } else {
      $rootNode = $treeBuilder->root('hbm_bootstrap_form');
    }

    $rootNode
      ->children()
        ->arrayNode('classes')->addDefaultsIfNotSet()
          ->children()
            ->arrayNode('card')->scalarPrototype()->end()->defaultValue(['mb-4'])->end()
            ->arrayNode('card_header')->scalarPrototype()->end()->defaultValue([])->end()
            ->arrayNode('card_body')->scalarPrototype()->end()->defaultValue([])->end()
            ->arrayNode('card_text')->scalarPrototype()->end()->defaultValue([])->end()
            ->arrayNode('card_item')->scalarPrototype()->end()->defaultValue([])->end()

            ->arrayNode('help')->scalarPrototype()->end()->defaultValue(['text-muted'])->end()

            ->arrayNode('alert_container')->scalarPrototype()->end()->defaultValue([])->end()
            ->arrayNode('alert_item')->scalarPrototype()->end()->defaultValue(['alert', 'alert-danger'])->end()

            ->arrayNode('button_container')->scalarPrototype()->end()->defaultValue(['btn-group', 'btn-group-toggle'])->end()
            ->arrayNode('button_item')->scalarPrototype()->end()->defaultValue(['btn', 'btn-secondary'])->end()
          ->end()
        ->end()
        ->arrayNode('elements')->addDefaultsIfNotSet()
          ->children()
            ->scalarNode('help')->defaultValue('small')->end()
          ->end()
        ->end()
      ->end();

    return $treeBuilder;
  }

}

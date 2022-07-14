<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeListExtension extends AbstractTypeExtension {

  /**
   * @var array
   */
  private $keys = [
    'li_attr' => [],
    'li_items_attr' => [],
  ];

  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    foreach ($this->keys as $key => $default) {
      $builder->setAttribute($key, $options[$key] ?? $default);
    }
  }

  /**
   * @param FormView      $view
   * @param FormInterface $form
   * @param array         $options
   */
  public function buildView(FormView $view, FormInterface $form, array $options) {
    foreach ($this->keys as $key => $default) {
      $view->vars[$key] = $options[$key] ?? $default;
    }
  }

  /**
   * Add the help option
   *
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefined(array_keys($this->keys));
  }

  /**
   * @return array
   */
  public static function getExtendedTypes() : iterable {
    return [ChoiceType::class];
  }

}

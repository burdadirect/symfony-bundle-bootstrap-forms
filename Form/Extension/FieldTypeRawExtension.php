<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeRawExtension extends AbstractTypeExtension {

  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->setAttribute('label_raw', (bool)($options['label_raw'] ?? FALSE));
    $builder->setAttribute('choice_label_raw', (bool)($options['choice_label_raw'] ?? FALSE));
  }

  /**
   * @param FormView      $view
   * @param FormInterface $form
   * @param array         $options
   */
  public function buildView(FormView $view, FormInterface $form, array $options) {
    $view->vars['label_raw'] = (bool)($options['label_raw'] ?? FALSE);
    $view->vars['choice_label_raw'] = (bool)($options['choice_label_raw'] ?? FALSE);
  }

  /**
   * Add the help option
   *
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefined(['label_raw', 'choice_label_raw']);
  }

  /**
   * @return array
   */
  public static function getExtendedTypes() : iterable {
    return [FormType::class];
  }

}

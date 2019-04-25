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
    if (isset($options['label_raw'])) {
      $builder->setAttribute('label_raw', (bool)$options['label_raw']);
    }
    if (isset($options['choice_label_raw'])) {
      $builder->setAttribute('choice_label_raw', (bool)$options['choice_label_raw']);
    }
  }

  /**
   * @param FormView      $view
   * @param FormInterface $form
   * @param array         $options
   */
  public function buildView(FormView $view, FormInterface $form, array $options) {
    if (isset($options['label_raw'])) {
      $view->vars['label_raw'] = (bool)$options['label_raw'];
    }
    if (isset($options['choice_label_raw'])) {
      $view->vars['choice_label_raw'] = (bool)$options['choice_label_raw'];
    }
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

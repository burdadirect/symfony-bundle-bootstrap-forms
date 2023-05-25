<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeRawChoiceLabelExtension extends AbstractTypeExtension {

  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->setAttribute('choice_label_html', (bool)($options['choice_label_html'] ?? FALSE));
  }

  /**
   * @param FormView      $view
   * @param FormInterface $form
   * @param array         $options
   */
  public function buildView(FormView $view, FormInterface $form, array $options) {
    $view->vars['choice_label_html'] = (bool)($options['choice_label_html'] ?? FALSE);
  }

  /**
   * Add the help option
   *
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefined(['choice_label_html']);
  }

  /**
   * @return array
   */
  public static function getExtendedTypes() : iterable {
    return [FormType::class];
  }

}

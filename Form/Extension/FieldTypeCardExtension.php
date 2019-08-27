<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeCardExtension extends AbstractTypeExtension {

  /**
   * @var array
   */
  private $keys = [
    'card_attr',
    'card_body_attr',
    'card_text_attr',
    'card_item_attr',
  ];

  /**
   * @param FormBuilderInterface $builder
   * @param array                $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    foreach ($this->keys as $key) {
      if (isset($options[$key])) {
        $builder->setAttribute($key, $options[$key]);
      }
    }
  }

  /**
   * @param FormView      $view
   * @param FormInterface $form
   * @param array         $options
   */
  public function buildView(FormView $view, FormInterface $form, array $options) {
    foreach ($this->keys as $key) {
      if (isset($options[$key])) {
        $view->vars[$key] = $options[$key];
      }
    }
  }

  /**
   * Add the help option
   *
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver) {
    foreach ($this->keys as $key) {
      $resolver->setDefined([$key]);
    }
  }

  /**
   * @return array
   */
  public static function getExtendedTypes() : iterable {
    return [FormType::class];
  }

}

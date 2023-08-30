<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeButtonExtension extends AbstractTypeExtension
{
    /** @var array */
    private $keys = [
      'button'                => false,
      'button_attr'           => [],
      'button_items_attr'     => [],
      'button_container_attr' => [],
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        foreach ($this->keys as $key => $default) {
            $builder->setAttribute($key, $options[$key] ?? $default);
        }
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        foreach ($this->keys as $key => $default) {
            $view->vars[$key] = $options[$key] ?? $default;
        }
    }

    /**
     * Add the help option
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined(array_keys($this->keys));
    }

    /**
     * @return array
     */
    public static function getExtendedTypes(): iterable
    {
        return [ChoiceType::class, CheckboxType::class];
    }
}

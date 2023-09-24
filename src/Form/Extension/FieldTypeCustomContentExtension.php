<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeCustomContentExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if (isset($options['custom_content'])) {
            $builder->setAttribute('custom_content', $options['custom_content']);
        }
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        if (isset($options['custom_content'])) {
            $view->vars['custom_content'] = array_merge_recursive($view->vars['custom_content'] ?? [], $options['custom_content']);
        }
    }

    /**
     * Add the custom_content option
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined(['custom_content']);
    }

    /**
     * @return array
     */
    public static function getExtendedTypes(): iterable
    {
        return [FormType::class];
    }
}

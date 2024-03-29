<?php

namespace HBM\BootstrapFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldTypeRawChoiceLabelExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setAttribute('choice_label_html', (bool) ($options['choice_label_html'] ?? false));
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['choice_label_html'] = (bool) ($options['choice_label_html'] ?? false);
    }

    /**
     * Add the help option
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined(['choice_label_html']);
    }

    /**
     * @return array
     */
    public static function getExtendedTypes(): iterable
    {
        return [FormType::class];
    }
}

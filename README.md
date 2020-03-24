# HBM Bootstrap Form Bundle

## Team

### Developers
Christian Puchinger - christian.puchinger@burda.com

## Installation

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require burdanews/symfony-bundle-bootstrap-forms
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

With Symfony 4 the bundle is enabled automatically for all environments (see `config/bundles.php`). 


### Step 3: Configuration

```yml
hbm_bootstrap_form:
  classes:
    card: ['mb-4']
    card_header: []
    card_body: []
    card_text: []
    card_item: []
    help: ['text-muted']
    alerts_ul: []
    alerts_li: ['alert', 'alert-danger']

  elements:
    help: small
    dev: small
```

## Usage

```php
    $group = $builder->create('group_default', FormType::class, [
      'inherit_data' => true,
      'label' => 'This is the headline',

      // Use bootstrap card layout.
      'card' => TRUE,

      // Add additional attributes to card element.
      'card_attr' => [],
      'card_header_attr' => [],
      'card_body_attr' => [],
 
      // Toggle will be shown, card is open.
      'attr' => ['data-card-collapsible' => 'open'],
      // Toggle will be shown, card is closed.
      'attr' => ['data-card-collapsible' => 'open'],
      // Toggle will be not be shown, card is open.
      'attr' => ['data-card-collapsible' => ''],

      // Will insert multiple custom contents at the defined position.
      'custom_content' => [
        // Will be rendered escapes.
        'before-header' => ['Content 1', 'Content 2'],
        'after-header' => [['value' => '<code>after_headline</code>']],

        // Will be rendered raw.
        'before-headline' => [['html' => '<p class="text">Content 3</p>']],

        // Will be rendered as template.
        'after-headline' => [['template' => 'path/to/template.html.twig', 'templateParams' => ['var1' => $var]]],
      
        // All options above can be mixed.
        'before-body' => [
          'This is a plain text.',
          ['html' => '<p class="text">And this is a HTML text.</p>'],
          ['template' => 'path/to/template.html.twig', 'templateParams' => ['obj' => $obj]]
        ],

        'after-body' => [/* ... */],
        'before-rows' => [/* ... */],
        'after-rows' => [/* ... */],
      ],
    ]);

    $group
      ->add('name', TextType::class, [
        'label' => 'Name',
        'required' => true,

        // Add additional attributes to card element.
        'card_text_attr' => [],
        'card_item_attr' => [],

        'custom_content' => [
          'before-text' => [/* ... */],
          'after-text' => [/* ... */],
          'before-item' => [/* ... */],
          'after-item' => [/* ... */],
          'before-label' => [/* ... */],
          'after-label' => [/* ... */],
          'before-widget' => [/* ... */],
          'after-widget' => [/* ... */],
        ],
        'help' => 'This is a help text.',
      ]);
```

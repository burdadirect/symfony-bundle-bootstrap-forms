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
    help: ['text-muted']
    dev: ['text-muted']
    alerts_ul: []
    alerts_li: ['alert', 'alert-danger']

  elements:
    help: small
    dev: small
```

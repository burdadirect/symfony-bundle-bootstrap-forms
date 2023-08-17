<?php

namespace HBM\BootstrapFormBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class BootstrapFormExtension extends AbstractExtension {

  /**
   * @var string
   */
  protected $base_url_images;

  /**
   * @var array
   */
  protected $config;

  public function __construct($config) {
    $this->config = $config;
  }

  public function getFunctions() : array {
    return [
      new TwigFunction('hbmbfClass', $this->hbmbfClass(...)),
      new TwigFunction('hbmbfClasses', $this->hbmbfClasses(...)),
      new TwigFunction('hbmbfElement', $this->hbmbfElement(...)),
      new TwigFunction('hbmbfHtml', $this->hbmbfHtml(...)),
      new TwigFunction('hbmbfTagStart', $this->hbmbfTagStart(...)),
      new TwigFunction('hbmbfTagEnd', $this->hbmbfTagEnd(...)),
    ];
  }

  public function getFilters() : array {
    return [
      new TwigFilter('hbmbfItemAttr', $this->hbmbfItemAttr(...)),
    ];
  }

  /****************************************************************************/
  /* FUNCTIONS                                                                */
  /****************************************************************************/

  public function hbmbfClass(string $key, array $classes = []) : string {
    return implode(' ', $this->hbmbfClasses($key, $classes));
  }

  public function hbmbfClasses(string $key, array $classes = []) : array {
    $customClasses = [];
    if ($key) {
      $customClasses = $this->config['classes'][$key] ?? [];
      if (is_string($customClasses)) {
        $customClasses = array_map('trim', explode(' ', $customClasses));
      }
    }

    return array_merge($classes, $customClasses);
  }

  public function hbmbfElement(string $key) : string {
    return $this->config['elements'][$key] ?? 'div';
  }

  public function hbmbfHtml($value, string $element, array $classes) : string {
    return $this->hbmbfTagStart($element, $classes).$value.$this->hbmbfTagEnd($element);
  }

  public function hbmbfTagStart(string $element, array $classes) : string {
    $attr = '';
    if ($classString = implode(' ', $classes)) {
      $attr = ' class="'.$classString.'"';
    }

    return '<'.$element.$attr.'>';
  }

  public function hbmbfTagEnd(string $element) : string {
    return '</'.$element.'>';
  }

  /****************************************************************************/
  /* FILTERS                                                                  */
  /****************************************************************************/

  /**
   * @param array|callable|null $attr
   * @param mixed $childLabel
   * @param mixed $childKey
   *
   * @return array|mixed|string
   */
  public function hbmbfItemAttr($attr, $choice, $childKey, $childLabel) {
    if (is_callable($attr)) {
      return $attr($choice, $childKey, $childLabel);
    }

    if (is_array($attr)) {
      return $attr[$childLabel] ?? $attr[$childKey] ?? [];
    }

    return [];
  }

}

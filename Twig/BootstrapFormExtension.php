<?php

namespace HBM\BootstrapFormBundle\Twig;

use Twig\Extension\AbstractExtension;
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
      new TwigFunction('hbmbfClass', [$this, 'hbmbfClass']),
      new TwigFunction('hbmbfClasses', [$this, 'hbmbfClasses']),
      new TwigFunction('hbmbfElement', [$this, 'hbmbfElement']),
      new TwigFunction('hbmbfHtml', [$this, 'hbmbfHtml']),
      new TwigFunction('hbmbfTagStart', [$this, 'hbmbfTagStart']),
      new TwigFunction('hbmbfTagEnd', [$this, 'hbmbfTagEnd']),
    ];
  }

  /****************************************************************************/
  /* FUNCTIONS                                                                */
  /****************************************************************************/

  public function hbmbfClass(array $classes = [], bool $withAttr = TRUE, string $sep = '') : string {
    $classString = implode(' ', $classes);

    if ($withAttr && $classString) {
      return $sep.'class="'.$classString.'"';
    }

    return $classString;
  }

  public function hbmbfClasses(string $key, array $classes = []) : array {
    $customClasses = [];
    if ($key) {
      $customClasses = $this->config['classes'][$key] ?? [];
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
    return '<'.$element.$this->hbmbfClass($classes, TRUE, ' ').'>';
  }

  public function hbmbfTagEnd(string $element) : string {
    return '</'.$element.'>';
  }

}

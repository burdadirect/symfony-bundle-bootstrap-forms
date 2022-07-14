<?php

namespace HBM\BootstrapFormBundle\src;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HBMBootstrapFormBundle extends Bundle {

  public function getPath(): string {
    return \dirname(__DIR__);
  }

}

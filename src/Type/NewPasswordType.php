<?php

namespace Drupal\notifier_demo\Type;

use Notifier\Type\TypeInterface;

class NewPasswordType implements TypeInterface {

  /**
   * @return string
   */
  public function getIdentifier() {
    return 'new_password_type';
  }

  public function getDescription() {
    return 'The message you get when you set a new password.';
  }
}

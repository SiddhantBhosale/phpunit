<?php

namespace Drupal\phpunit;

interface MyServiceInterface {

  /**
   * Gets the label.
   *
   * @param $key
   *   The machine name for the label/message pair.
   *
   * @return string|bool
   *   The human readable label if found, FALSE otherwise.
   */
  public function getLabel($key);

  /**
   * Gets the message.
   *
   * @param $key
   *   The machine name for the label/message pair.
   *
   * @return string|bool
   *   The message if found, FALSE otherwise.
   */
  public function getMessage($key);
}

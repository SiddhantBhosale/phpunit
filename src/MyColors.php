<?php


namespace Drupal\phpunit;

/**
 * Provides status constants for phpunit.
 */
final class MyColors {

  const BLUE = 2;
  const ORANGE = 3;


  /**
   * Get all the colors as text constants keyed by numeric status.
   *
   * This method provides a canonical text version of the status, useful for
   * theme variables and other places so you can avoid a large switch statement.
   *
   * @return array
   *   An array of text constants keyed by color.
   */
  public static function getTextConstants() {
    return [
      static::BLUE    => 'blue_color',
      static::ORANGE     => 'orange_color',
    ];
  }

  /**
   * Get all the colors keyed by text constant.
   *
   * @return array
   *   An array of colors keyed by text constant.
   */
  public static function getAsArrayByConstants() {
    return [
      'blue_color'    => static::BLUE,
      'orange_color'     => static::ORANGE,
    ];
  }

  /**
   * Gets the numeric status given the text constant.
   *
   * @param string $color_text
   *   A string containing a status text constant.
   *
   * @return bool|int
   *   The numeric status if found, FALSE otherwise.
   */
  public static function constantToNumeric($color_text) {
    $colors = static::getAsArrayByConstants();

    return isset($colors[$color_text]) ? $colors[$color_text] : FALSE;
  }

  /**
   * Gets the color as a text constant given the numeric value.
   *
   * @param int $color
   *   The numeric color value.
   *
   * @return bool|string
   *   The color as a text constant if found, FALSE otherwise.
   */
  public static function numericToConstant($color) {
    $colors = static::getTextConstants();

    return isset($colors[$color]) ? $colors[$color] : FALSE;
  }
}

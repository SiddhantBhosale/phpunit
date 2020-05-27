<?php

namespace Drupal\Tests\phpunit\Unit;

use Drupal\phpunit\MyColors;
use Drupal\Tests\UnitTestCase;

/**
 * Unit tests for the MyColors utility class.
 *
 * @group phpunit
 */
class MyColorsTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    // Nothing to do here. Added just for reference but nothing really to do.
    parent::setUp();
  }

  /**
   * Tests the constant to numeric method.
   */
  public function testConstantToNumeric() {

    $this->assertEquals(MyColors::ORANGE, MyColors::constantToNumeric('orange_color'));

    $this->assertEquals(MyColors::BLUE, MyColors::constantToNumeric('blue_color'));

    $this->assertFalse(MyColors::constantToNumeric('puprle_color'));


  }

  /**
   * Tests the numeric to constant method.
   */
  public function testNumericToConstant() {

    $this->assertEquals(MyColors::numericToConstant(MyColors::ORANGE), 'orange_color');

    $this->assertEquals(MyColors::numericToConstant(MyColors::BLUE), 'blue_color');

    $this->assertFalse(MyColors::numericToConstant(-9999));
  }
}

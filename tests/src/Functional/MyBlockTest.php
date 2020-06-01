<?php

namespace Drupal\Tests\phpunit\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test the configuration options and block created by Block Example module.
 *
 * @group phpunit
 */
class MyBlockTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['block', 'block_example'];

  /**
   * Tests block_example functionality.
   */
  public function testBlockExampleBasic() {
    $assert = $this->assertSession();

    // Create user.
    $web_user = $this->drupalCreateUser(['administer blocks']);
    // Login the admin user.
    $this->drupalLogin($web_user);

    $theme_name = $this->config('system.theme')->get('default');

    // Verify the blocks are listed to be added.
    $this->drupalGet('/admin/structure/block/library/' . $theme_name, ['query' => ['region' => 'content']]);
    $assert->pageTextContains('My block');

    // Define and place blocks.
    $settings_block = [
      'label' => 'MyBlock block',
      'id' => 'myblock_demo_test_block',
      'theme' => $theme_name,
    ];
    $this->drupalPlaceBlock('my_block_demo_block', $settings_block);

    // Verify that blocks are there.
    $this->drupalGet('');
    $assert->pageTextContains($settings_block['label']);
  }

}

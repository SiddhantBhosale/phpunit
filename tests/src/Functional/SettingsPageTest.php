<?php

namespace Drupal\Tests\phpunit\Functional;

use Behat\Mink\Element\NodeElement;
use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Test the module settings page
 *
 * @group phpunit
 */
class SettingsPageTest extends BrowserTestBase {

  /**
   * The modules to load to run the test. (This is used by the framework to know which modules needs to be enabled while running test.)
   *
   * @var array
   */
  public static $modules = [
    'user',
    'phpunit',
  ];

  /**
   * @var string
   */
  protected $defaultTheme = 'stable';


  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * Tests the setting form.
   */
  public function testForm() {
    // Create the user with the appropriate permission.
    $admin_user = $this->drupalCreateUser([
      'administer site configuration',
    ]);

    // Start the session.
    $session = $this->assertSession();

    // Login as our account.
    $this->drupalLogin($admin_user);

    // Get the settings form path from the route
    $settings_form_path = Url::fromRoute('phpunit.settings');

    // Navigate to the settings form
    $this->drupalGet($settings_form_path);

    // Assure we loaded settings with proper permissions.
    $session->statusCodeEquals(200);

    // Update our text field with a new value.
    $edit = [
      'name' => 'Qed42',
    ];

    $this->drupalPostForm($settings_form_path, $edit, 'Save configuration');

    // Reload the page.
    $this->drupalGet($settings_form_path);

    /** @var NodeElement $omit */
    $name = $session->fieldExists('name')->getValue();

    // Check that we will not run every cron run.
    $this->assertTrue($name == 'Qed42');

  }


}

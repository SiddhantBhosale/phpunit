<?php

namespace Drupal\Tests\phpunit\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the MyService
 *
 * @group phpunit
 */
class MyServiceTest extends KernelTestBase {

  /**
   * The service under test.
   *
   * @var \Drupal\phpunit\MyServiceInterface
   */
  protected $myService;

  /**
   * The modules to load to run the test.
   *
   * @var array
   */
  public static $modules = [
    'phpunit',
    'my_phpunit',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->installConfig(['phpunit']);

    $this->myService = \Drupal::service('phpunit.status_text');
  }

  public function testLabel() {
    $label = $this->myService->getLabel('my_service_test');
    $this->assertTrue($label == 'My Test Label', $label);
  }

  public function testMessage() {
    $message = $this->myService->getMessage('my_service_test');
    $this->assertTrue($message == 'My test message', $message);
  }

  public function testNotFound() {
    $label = $this->myService->getLabel('doesnt_exist_key');
    $this->assertFalse($label);

    $message = $this->myService->getMessage('doesnt_exist_key');
    $this->assertFalse($message);
  }

}

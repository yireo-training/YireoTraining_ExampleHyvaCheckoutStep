<?php declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutStep\Test\Integration;

use Hyva\Checkout\Model\Config;
use Magento\Framework\App\ObjectManager;
use PHPUnit\Framework\TestCase;
use Yireo\IntegrationTestHelper\Test\Integration\Traits\AssertModuleIsEnabled;

class CheckoutStepTest extends TestCase
{
    use AssertModuleIsEnabled;

    public function testStepIsRegistered()
    {
        $this->assertModuleIsEnabled('YireoTraining_ExampleHyvaCheckoutStep');

        $checkoutConfig = ObjectManager::getInstance()->get(Config::class);
        $checkouts = $checkoutConfig->getList();
        $isFound = false;
        foreach ($checkouts as $checkout) {
            if ($checkout['name'] === 'examplestep') {
                $isFound = true;
            }
        }

        $this->assertTrue($isFound);
    }
}
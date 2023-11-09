<?php
declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutStep\ViewModel;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class AdditionalDetails implements ArgumentInterface
{
    public function __construct(
        private CheckoutSession $checkoutSession
    ) {
    }

    public function getDiet(): string
    {
        return (string) $this->checkoutSession->getDiet();
    }

    public function getComment(): string
    {
        return (string) $this->checkoutSession->getComment();
    }
}

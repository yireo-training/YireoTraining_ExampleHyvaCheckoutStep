<?php
declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutStep\Magewire\Checkout;

use Magento\Checkout\Model\Session\Proxy as CheckoutSession;
use Magewirephp\Magewire\Component;

class AdditionalDetails extends Component
{
    public function __construct(
        private CheckoutSession $checkoutSession
    ) {
    }

    public ?string $diet = '';
    public ?string $comment = '';

    public function mount()
    {
        $this->diet = $this->checkoutSession->getDiet();
        $this->comment = $this->checkoutSession->getComment();
    }

    public function updatedDiet(?string $value)
    {
        $this->checkoutSession->setDiet((string)$value);
        return (string)$value;
    }


    public function updatedComment(?string $value)
    {
        $this->checkoutSession->setComment((string)$value);
        return (string)$value;
    }
}

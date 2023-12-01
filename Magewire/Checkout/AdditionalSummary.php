<?php
declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutStep\Magewire\Checkout;

use Magento\Checkout\Model\Session\Proxy as CheckoutSession;
use Magewirephp\Magewire\Component;

class AdditionalSummary extends Component
{
    public function __construct(
        private CheckoutSession $checkoutSession
    ) {
    }

    protected $listeners = [
        'updateAdditionalDetails' => 'reload'
    ];

    public ?string $diet = '';
    public ?string $comment = '';

    public function mount()
    {
        $this->diet = $this->checkoutSession->getDiet();
        $this->comment = $this->checkoutSession->getComment();
    }

    public function reload()
    {
        $this->diet = $this->checkoutSession->getDiet();
        $this->comment = $this->checkoutSession->getComment();
    }
}

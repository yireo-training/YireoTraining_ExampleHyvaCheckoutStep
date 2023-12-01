<?php
declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutStep\Magewire\Checkout;

use Magento\Checkout\Model\Session\Proxy as CheckoutSession;
use Magento\Framework\Filter\FilterManager;
use Magewirephp\Magewire\Component;

class AdditionalDetails extends Component
{
    public function __construct(
        private CheckoutSession $checkoutSession,
        private FilterManager $filterManager
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
        $value = $this->filterManager->stripTags($value);
        $this->checkoutSession->setDiet((string)$value);
        $this->emit('updateAdditionalDetails');
        return (string)$value;
    }

    public function updatedComment(?string $value)
    {
        $value = $this->filterManager->stripTags($value);
        $this->checkoutSession->setComment((string)$value);
        $this->emit('updateAdditionalDetails');
        return (string)$value;
    }
}

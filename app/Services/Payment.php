<?php

namespace App\Services;

use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use App\Services\CartFacade as Cart;
use Modules\Products\Entities\Product;

class Payment
{
    /**
     * Invoice object
     * 
     * @var \Shetabit\Multipay\Invoice
     */
    private $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Create new invoice for orders
     * 
     * @param int $totalPrice
     */
    public function createInvoice(int $totalPrice)
    {
        $this->invoice->amount($totalPrice);
        // $this->invoice->detail(['detailName' => 'your detail goes here']);
    }

    public function goToGatway($order)
    {
        return ShetabitPayment::callbackUrl(route('FrontEnd.checkout.callback'))->purchase($this->invoice, function ($driver, $transactionId) use ($order) {
            $order->Invoice()->create([
                'uuid' => $this->invoice->getUuid(),
                'transaction_id' => $transactionId,
                'amount' => $this->invoice->getAmount(),
                'status' => 0
            ]);
        })->pay()->render();
    }

    public function verify($transactionId)
    {
        $invoice = \App\Invoice::where('transaction_id', $transactionId)->first();
        try {
            $receipt = ShetabitPayment::amount($invoice->amount)
                ->transactionId($transactionId)->verify();

            $invoice->update([
                'refrence_id' => $receipt->getReferenceId(),
                'status' => 1
            ]);

            $invoice->Order->update([
                'status' => 1
            ]);

            $ids = [];
            foreach (Cart::content() as $cart) {
                if ($cart->discount) {
                    auth()->user()->ExpiredDiscounts()->create([
                        'product_id' => $cart->id
                    ]);
                    $product = Product::where('id', $cart->id)->first();
                    $product->update([
                        'discount_count' => $product->discount_count - 1
                    ]);
                }
            }
            //Remove cart items
            Cart::destroy();

            return redirect()->to(route('FrontEnd.checkout.show', $invoice->order_id));
        } catch (InvalidPaymentException $exception) {
            echo $exception->getMessage();
        }
    }
}

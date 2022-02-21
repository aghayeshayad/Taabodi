<?php

namespace App\Services;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use Modules\Products\Entities\Product;

class Cart
{
    private const SESSION_KEY = 'cart';

    /**
     * Add item to cart
     *
     * @param int $id
     * @param int $price
     * @param int $count
     * @param int||null $discount
     * @param array||null $options
     * @return CartItem
     */
    public function add($id, $price, $count, $options = [])
    {
        $cartItem = $this->createCartItem($id, $price, $count, $this->getDiscount($id), $options);

        return $this->addCartItem($cartItem);
    }

    public function getDiscount($id)
    {
        $product = Product::find($id);

        $cart = $this->find($id);

        return ((($product->discount_count == 1) && collect($cart)->isEmpty()) &&
            auth()->check() && $product->discount_count && !auth()->user()->userUsedDiscount($id)) ? $product->discount : 0;
    }

    /**
     * Create a new CartItem from the supplied attributes.
     *
     * @param mixed $id
     * @param mixed $name
     * @param float $price
     * @param float $count
     * @param array $options
     * @param int||null  $discount
     *
     * @return CartItem
     */
    private function createCartItem($id, $price, $count, $discount, array $options)
    {
        $cartItem = CartItem::fromAttributes($id, $price, $count, $discount, $options);

        return $cartItem;
    }

    /**
     * Add an item to the cart.
     *
     * @param \Gloudemans\Shoppingcart\CartItem $item Item to add to the Cart
     * @param bool $keepDiscount Keep the discount rate of the Item
     * @param bool $keepTax Keep the Tax rate of the Item
     * @param bool $dispatchEvent
     *
     * @return \Gloudemans\Shoppingcart\CartItem The CartItem
     */
    public function addCartItem($item)
    {
        $content = $this->getContent();

        if ($content->has($item->rowId)) {
            $item->count += $content->get($item->rowId)->count;
        }

        $content->put($item->rowId, $item);

        session()->put(self::SESSION_KEY, $content);

        return $item;
    }

    /**
     * Get the carts content, if there is no cart content set yet, return a new empty Collection.
     *
     * @return Collection
     */
    protected function getContent()
    {
        if (session()->has(self::SESSION_KEY)) {
            return session()->get(self::SESSION_KEY);
        }

        return new Collection();
    }

    /**
     * Update the cart item with the given rowId.
     *
     * @param string $rowId
     * @param mixed $qty
     *
     * @return CartItem
     */
    public function update($rowId, $count)
    {
        $cartItem = $this->get($rowId);

        if (is_array($count)) {
            $cartItem->updateFromArray($count);
        } else {
            $cartItem->count = $count;
        }

        $content = $this->getContent();

        if ($rowId !== $cartItem->rowId) {
            $itemOldIndex = $content->keys()->search($rowId);

            $content->pull($rowId);

            if ($content->has($cartItem->rowId)) {
                $existingCartItem = $this->get($cartItem->rowId);
                $cartItem->setQuantity($existingCartItem->count + $cartItem->count);
            }
        }

        if ($cartItem->count <= 0) {
            $this->remove($cartItem->rowId);

            return;
        } else {
            if (isset($itemOldIndex)) {
                $content = $content->slice(0, $itemOldIndex)
                    ->merge([$cartItem->rowId => $cartItem])
                    ->merge($content->slice($itemOldIndex));
            } else {
                $content->put($cartItem->rowId, $cartItem);
            }
        }

        session()->put(self::SESSION_KEY, $content);

        return $cartItem;
    }

    /**
     * Get a cart item from the cart by its rowId.
     *
     * @param string $rowId
     *
     * @return \Gloudemans\Shoppingcart\CartItem
     */
    public function get($rowId)
    {
        $content = $this->getContent();

        if (!$content->has($rowId)) {
            throw new InvalidArgumentException("The cart does not contain rowId {$rowId}.");
        }

        return $content->get($rowId);
    }

    public function find($id)
    {
        return $this->getContent()->map(function ($cartItem) use($id) {
            return ($cartItem->id == $id) ? $cartItem : null;
        });
    }

    /**
     * Remove the cart item with the given rowId from the cart.
     *
     * @param string $rowId
     *
     * @return void
     */
    public function remove($rowId)
    {
        $cartItem = $this->get($rowId);

        $content = $this->getContent();

        $content->pull($cartItem->rowId);

        session()->put(self::SESSION_KEY, $content);
    }

    /**
     * Get the price of the items in the cart as formatted string.
     *
     * @return string
     */
    public function totalPrice()
    {
        return $this->getContent()->reduce(function ($initial, CartItem $cartItem) {
            return $initial + $cartItem->price * $cartItem->count;
        }, 0);
    }

    public function totalPriceWithDiscount()
    {
        return $this->getContent()->reduce(function ($initial, CartItem $cartItem) {
            if ($cartItem->discount) {
                return $initial + $cartItem->priceWithDiscount;
            }

            return $initial + $cartItem->price;
        }, 0);
    }

    /**
     * Destroy the current cart instance.
     *
     * @return void
     */
    public function destroy()
    {
        session()->remove(self::SESSION_KEY);
    }

    /**
     * Get the content of the cart.
     *
     * @return Collection
     */
    public function content()
    {
        if (is_null(session()->get(self::SESSION_KEY))) {
            return new Collection([]);
        }

        return session()->get(self::SESSION_KEY);
    }
}

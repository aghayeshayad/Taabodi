<?php

namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;

class CartItem implements Arrayable, Jsonable
{
    /**
     * Cart item random id
     * 
     * @var string
     */
    public $rowId;

    /**
     * Cart item id
     * 
     * @var int
     */
    public $id;

    /**
     * Cart item price
     * 
     * @var int 
     */
    public $price;

    /**
     * Cart item count
     * 
     * @var int
     */
    public $count;

    /**
     * Cart item discount
     * 
     * @var int||null
     */
    public $discount = 0;

    /**
     * @product options
     * 
     * @var array||null
     */
    public $options;

    private $associatedModel;

    public function __construct($id, $price, $count, $discount, $options = [])
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Please supply a valid identifier.');
        }
        if (strlen($price) < 0 || !is_numeric($price)) {
            throw new \InvalidArgumentException('Please supply a valid price.');
        }
        if (empty($count)) {
            throw new \InvalidArgumentException('Please supply a valid count.');
        }

        $this->id = $id;
        $this->price = $price;
        $this->count = $count;
        $this->discount = $discount;
        $this->options = $options;
        $this->rowId = $this->generateRowId($id, $options);
    }

    public static function fromAttributes($id, $price, $count, $discount, $options = [])
    {
        return new self($id, $price, $count, $discount, $options);
    }

    /**
     * Associate the cart item with the given model.
     *
     * @param mixed $model
     *
     * @return \Gloudemans\Shoppingcart\CartItem
     */
    public function associate($model)
    {
        $this->associatedModel = is_string($model) ? $model : get_class($model);

        return $this;
    }

    /**
     * Get an attribute from the cart item or get the associated model.
     *
     * @param string $attribute
     *
     * @return mixed
     */
    public function __get($attribute)
    {
        if (property_exists($this, $attribute)) {
            return $this->{$attribute};
        }

        switch ($attribute) {
            case 'model':
                if (isset($this->associatedModel)) {
                    return with(new $this->associatedModel())->find($this->id);
                }
                // no break
            case 'orginalassociatedModel':
                if (isset($this->associatedModel)) {
                    return $this->associatedModel;
                }
            case 'priceWithDiscount':
                if ($this->discount) {
                    $totalPrice = $this->price * $this->count;
                    return $totalPrice - ($totalPrice * ($this->discount / 100));
                }
        }
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'rowId'    => $this->rowId,
            'id'       => $this->id,
            'count'      => $this->qty,
            'price'    => $this->price,
            'discount' => $this->discount,
            'options'  => is_object($this->options)
                ? $this->options->toArray()
                : $this->options,
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Generate a unique id for the cart item.
     *
     * @param string $id
     * @param array  $options
     *
     * @return string
     */
    protected function generateRowId($id, array $options)
    {
        ksort($options);

        return md5($id . serialize($options));
    }
}

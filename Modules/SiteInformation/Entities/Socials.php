<?php

namespace Modules\SiteInformation\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class Socials extends Model
{

    public const SOCIALS = [
        1 => [
            'type' => 1,
            'title' => 'اینستاگرام',
            'icon' => 'fab fa-instagram'
        ],
        2 => [
            'type' => 2,
            'title' => 'توییتر',
            'icon' => 'fab fa-twitter'
        ],
        3 => [
            'type' => 3,
            'title' => 'واتس اپ',
            'icon' => 'fab fa-whatsapp'
        ],
        4 => [
            'type' => 4,
            'title' => 'تلگرام',
            'icon' => 'fab fa-telegram'
        ]
    ];

    /**
     * Set socials table fillable fields
     *
     * @var array
     */
    protected $fillable = ['type', 'link'];

    /**
     * Change socials type attribute value
     *
     * @param $value
     * @return mixed
    */
    public function getTypeAttribute($value)
    {
        foreach (self::SOCIALS as $item) {
            if ($value == $item['type']) {
                return $item['title'];
            }
        }
    }
}

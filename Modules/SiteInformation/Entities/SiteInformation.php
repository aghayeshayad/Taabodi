<?php

namespace Modules\SiteInformation\Entities;

use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{

    protected $table='siteinformation';
    /**
     * Social media items
     *
     * @var array
     */
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
     * Setting types
     *
     * @var array
     */
    public const TYPES = [
        'about_us' => 0,
        'contact_us' => 1,
        'socials' => 2,
        'fast_links' => 3,
    ];

    /**
     * Settings table fillable fields
     *
     * @var array
     */
    protected $fillable = ['type', 'data'];

    /**
     * Convert data attribute value to json
     *
     * @param array $value
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    /**
     * Decode data json value
     *
     * @return array
     */
    public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true)['data'] : [];
    }

    /**
     * Return aboutUs image
     *
     * @return String||null
     */
    public function getImageAttribute()
    {
        return $this->data ? asset('/uploads/settings/aboutus/'.$this->data['image']) : null;
    }

}

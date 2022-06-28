<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address' => "Taxtapul dahasi, Sebzor ko'chasi 3A",
            'address_link' => 'https://yandex.uz/maps/10335/tashkent/house/YkAYdAJpS0MDQFprfX91cXpnbA==/?ll=69.259293%2C41.340516&z=20.52',
            'email' => 'faacuz@gmail.com',
            'phone' => '+998 (99) 999 99 99',
            'location' => '[41.340648, 69.259264]',
            'telegram' => 'https://www.telegram.org',
            'youtube' => 'https://www.youtube.com/user/FAACUK',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instafram.com',
        ];
    }
}

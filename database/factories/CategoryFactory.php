<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $counter = -1;
    public function definition()
    {
        $categories = [
            'barriers',
            'bollards',
            'doors',
            'commercial gates',
            'residential gates',
        ];
        $images = [
            'https://faac.blob.core.windows.net/web/1/news/b680install-hrd-2_w838.jpg',
            'https://img.archiexpo.com.ru/images_ae/photo-g/59812-16897486.webp',
            'https://img.archiexpo.com.ru/images_ae/photo-g/59812-12283968.webp',
            'https://www.timeshighereducation.com/sites/default/files/forgemasters.jpg',
            'https://faac.blob.core.windows.net/web/1/case-studies/gates/layer-17.png',
        ];
        $this->counter++;
        return [
            'name_uz' => $categories[$this->counter].' uz',
            'name_ru' => $categories[$this->counter].' ru',
            'name_en' => $categories[$this->counter].' en',
            'slug' => str_replace(' ', '-', $categories[$this->counter]),
            'image' => $images[$this->counter],
        ];
    }
}

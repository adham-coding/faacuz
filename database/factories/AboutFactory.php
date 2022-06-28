<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $counter = -1;
    public function definition()
    {
        $titles = [
            "All our numbers mean we're number one.",
            "Some dreams become reality under the same sky",
            "Quality, Safety, Research And Development:
            4 Aces Always up our sleeve.",
            "A group, many numbers, one goal.",
        ];
        $paragraphs = [
            "Number count, and how.

                Our milestone 50 years of business, for example, lead us to head towards even more ambitious aims and
                increasingly more significant results. For us, having reached them, and for all those who will be able to
                improve their lives thanks to FAAC technology, which, getting back to the figures, boasts the highest number of
                patents: 42 Gate automation originates from the intuition of our founder who first designed it and developed it.
                And together with us, remains in first place worldwide. And in our hearts.",
            "FAAC pride goes beyond Italian manufacturing: actually, it's even closer to
                home. The dream which first opened
                the doors of automation to all originated in the same land that has expanded worldwide technological excellence.
      
                We like to think that it is no coincidence.
      
                We emphasise that the determination of certain dreamers, here in Emilia, has always found fertile ground as well
                as people who can imagine anything and have tireless arms, always aiming at improving the work that has just
                been completed.
      
                Clearly, the technology made in Emilia consists of research, quality and innovation but especially of dreams ...
                by people who are on the ball.",
            "FAAC pride goes beyond Italian manufacturing: actually, it's even closer to
                home. The dream which first opened the doors of automation to all originated in the same land that has expanded
                worldwide technological excellence.
      
                FAAC pride goes beyond Italian manufacturing: actually, it's even closer to home. The dream which first opened
                the doors of automation to all originated in the same land that has expanded worldwide technological excellence.
      
                FAAC pride goes beyond Italian manufacturing: actually, it's even closer to home. The dream which first opened
                the doors of automation to all originated in the same land that has expanded worldwide technological excellence.",
            "2,400 people, 32 subsidiaries in 5 continents, over 80 official distributors worldwide: these figures sketch out
                a business in constant evolution: the FAAC group.
      
                While the technological heart continues to beat in Bologna, FAAC has concentrated the group's electronics
                manufacturing in Dublin, creating the necessary synergies to offer products according to FAAC parameters:
                innovative, reliable and unbeatable.",
        ];
        $images = [
            'https://www.faac.co.uk/Apps/FAAC/Content/images/bg1.jpg',
            'https://www.faac.co.uk/Apps/FAAC/Content/images/bg2.jpg',
            'https://www.faac.co.uk/Apps/FAAC/Content/images/bg3.jpg',
            'https://www.faac.co.uk/Apps/FAAC/Content/images/bg4.jpg',
        ];
        $this->counter++;
        return [
            'title_uz' => $titles[$this->counter],
            'title_ru' => $titles[$this->counter],
            'title_en' => $titles[$this->counter],
            'paragraph_uz' => $paragraphs[$this->counter],
            'paragraph_ru' => $paragraphs[$this->counter],
            'paragraph_en' => $paragraphs[$this->counter],
            'image' => $images[$this->counter],
        ];
    }
}

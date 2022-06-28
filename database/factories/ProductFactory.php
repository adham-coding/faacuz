<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $description = 'A newly designed barrier, aimed at meeting a wide range of requirements, from residential to commercial use.

        Dedicated and intuitive electronics
        
        Electronic equipment, integrated in the upper part, protected by a coloured plastic cover that enhances the visibility of the LEDs. Intuitive programming via buttons and display. Wide choice of operating logics and configurable parameters. Integrated OMNIDEC universal radio decoding system. System protection and BUS 2Easy accessories simple to connect using only two non-polarised wires.
        
        Robust, reliable, high performance
        
        The exclusive use of high quality components and materials makes the B614 a robust and reliable operator. A quadrilateral lever system with two reduction stages makes beam movement even smoother.
        
        Maximum anti-crushing safety
        
        A 24V motor with an integrated encoder provides a high degree of motion control and allows the reverse on obstacle safety standards to be met.
        
        Complete range of accessories
        
        Numerous accessories are available in order to personalise the product: beam lights and traffic light kit, hedge kit, joint kit, end foot and beam support fork. The beams, fitted with a rubber anti-impact profile, are available in both rectangular and rounded versions. Optional reflective stickers and LED lighting along the entire length of the beam (rounded or rectangular) make it easy to see even in conditions of poor visibility.';
        $word = $this->faker->name();
        $rand = rand(1, 5);
        $images = [
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/b614-for-website-new_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/rectangular-beam-500-w440_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/round-beam-500-w440_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-008_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-009_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-011_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-010_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-001_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-007_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-004_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-005_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-003_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-002_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-014_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-012_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-013_w434.jpg',
            'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/faac-b614-electromechanical-barrier-015_w434.jpg',
        ];
        $features =
            [
                "Modern design",
                "Dedicated and intuitive electronics",
                "Robust, reliable, high performance",
                "Maximum anti-crushing safety",
                "Complete range of accessories"
            ];
        return [
            'category_id' => $rand,
            'name' => $word,
            'slug' => str_replace(' ', '-', $word),
            'images' => json_encode($images),
            'youtube' => 'https://www.youtube-nocookie.com/embed/ZufvU76wThQ',
            'price' => rand(1000, 5000),
            'features_uz' => json_encode($features),
            'features_ru' => json_encode($features),
            'features_en' => json_encode($features),
            'requirements' => 'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/b614-typical-installation-requirements.pdf',
            'instructions' => 'https://faac.blob.core.windows.net/web/1/automatic-barriers/faac-barriers/b614-automatic-barrier/articulated-beam-kit-732816-revc-multi.pdf',
            'parts' => 'https://spareparts.faacgroup.com/accessautomation/spareparts/drawingPage/8471?_ga=2.231976735.1245022806.1655232433-1017335213.1655232432',
            'description_uz' => $description,
            'description_ru' => $description,
            'description_en' => $description,
        ];
    }
}

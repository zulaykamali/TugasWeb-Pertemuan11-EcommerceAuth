<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            'Serum Vitamin C',
            'Serum Niacinamide',
            'Moisturizer Hyaluronic Acid',
            'Sunscreen SPF 50',
            'Facial Wash Gentle',
            'Cleansing Balm',
            'Micellar Water',
            'Toner Hydrating',
            'Essence Brightening',
            'Eye Cream',
            'Lipstick Matte',
            'Lip Cream Velvet',
            'Lip Tint Natural',
            'Foundation Liquid',
            'Cushion Compact',
            'Concealer Full Coverage',
            'Blush On Powder',
            'Highlighter Glow',
            'Eyeshadow Palette',
            'Mascara Waterproof',
            'Eyeliner Waterproof',
            'Makeup Remover',
            'Loose Powder',
            'Setting Spray',
            'Shampoo Anti Dandruff',
            'Conditioner Smooth',
            'Hair Serum',
            'Hair Mask',
            'Body Lotion',
            'Body Scrub',
            'Body Wash',
            'Hand Cream',
            'Parfum Floral',
            'Parfum Vanilla',
            'Parfum Fresh',
            'Deodorant Spray',
            'Sheet Mask Aloe Vera',
            'Clay Mask',
            'Peel Off Mask',
            'Acne Spot Treatment',
            'Retinol Serum',
            'AHA BHA Toner',
            'Salicylic Acid Cleanser',
            'Ceramide Cream',
            'Sunscreen Gel',
            'Lip Balm Moisturizing',
            'Lip Scrub',
            'Brow Pencil',
            'False Eyelashes',
            'Nail Polish',
            'Cuticle Oil',
            'Beauty Blender',
            'Makeup Brush Set',
        ];

        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            'name' => fake()->randomElement($products),
            'description' => fake()->sentence(12),
            'price' => fake()->randomFloat(2, 25000, 500000),
            'stock' => fake()->numberBetween(0, 100),
            'image' => null,
        ];
    }
}

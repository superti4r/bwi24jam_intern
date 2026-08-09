<?php

namespace Database\Factories;

use App\Enum\Status;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(2, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(3, true),
            'status' => Status::DRAFT->value,
        ];
    }
}

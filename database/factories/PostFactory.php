<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'posts/mains/DflRoQmyZPoxiDie8hMSCOVBlJnmMls53P6dHjV2.avif',
            'posts/previews/I7ofwDjdCopNYUuUH7BgELhfXJL8ZBfHeC65VkPw.jpg',
            'posts/previews/p4Fs0lHWfXtaJ5PNIEnqzIGZDWf0QXQ0A2mRBZsS.jpg',
        ];

        return [
            'title' => $this->faker->sentence(2),
            'content' => $this->faker->sentence(15),
            'category_id' => Category::inRandomOrder()->first()->id,
            'approved' => rand(0, 1),
            'preview_image' => $images[rand(0, 2)],
            'main_image' => $images[rand(0, 2)]
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($tags as $tag) {
                PostTag::factory()->create([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id,
                ]);
            }
        });
    }
}

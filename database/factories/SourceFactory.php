@<?php

    namespace Database\Factories;

    use App\Models\Author;
    use App\Models\Publication;
    use App\Models\Repository;
    use App\Models\Source;
    use App\Models\Type;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class SourceFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Source::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'sour' => $this->faker->word(),
                'titl' => $this->faker->word(),
                'auth',
                'data' => $this->faker->word(),
                'text' => $this->faker->word(),
                'publ' => $this->faker->text(),
                'abbr' => $this->faker->word(),
                'name' => $this->faker->word(),
                'description' => $this->faker->word(),
                'repository_id' => Repository::factory(),
                'author_id' => Author::factory(),
                'publication_id' => Publication::factory(),
                'type_id' => Type::factory(),
                'is_active', 'group' => $this->faker->word(),
                'gid' => $this->faker->word(),
                'quay' => $this->faker->word(),
                'page' => $this->faker->word()
            ];
        }
    }

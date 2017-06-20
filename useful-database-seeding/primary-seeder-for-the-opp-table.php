<?php

class OppTableSeeder extends Seeder
{
    protected $categoryFinder;
    protected $places;
    protected $imageArray = ['http://example.com/images/example.jpg'];

    public function __construct(categoryFinder $finder, Place $places)
    {
        $this->categoryFinder = $finder;
        $this->places = $places;
    }

    public function run()
    {
        $faker = Faker\Factory::create();

        collect(Merchant::all())->each(function ($merchant) {
            collect(range(1, rand(2, 4)))->each(function ($i) {
                $images = Image::create([
                    'name' => "{$merchant->name Image {$i}}",
                    'url' => $faker->randomElement($this->imageArray),
                ]);

                $starts = Carbon::now();
                $ends = Carbon::now()->addDays($i == 1 ? 2 : 60);
                $teaser = $i == 1 ? 'Something about cheese' : $faker->sentence(rand(3, 5));
                $category = $this->categoryFinder->setRandom()->getOne();

                $opp = Opp::create([
                    'name' => $faker->sentence(rand(3, 5)),
                    'teaser' => $teaser,
                    'details' => $faker->paragraph(3),
                    'starts' => $starts->format('Y-m-d H:i:s'),
                    'ends' => $ends->format('Y-m-d H:i:s'),
                    'category_id' => $category->id,
                    'merchant_id' => $merchant->id,
                    'published'  => true,
                ]);

                $opp->images()->attach($image, ['published' => true]);
            });
        });
    }
}

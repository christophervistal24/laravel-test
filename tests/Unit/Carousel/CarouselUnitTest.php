<?php

namespace Tests\Feature\Unit\Carousel;

use Tests\TestCase;
use App\Shop\Carousels\Carousel;
use App\Shop\Carousels\Repositories\CarouselRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarouselUnitTest extends TestCase
{
     /** @test */
    public function it_can_delete_the_carousel()
    {
        $carousel = factory(Carousel::class)->create();
        $carouselRepo = new CarouselRepository($carousel);
        $delete = $carouselRepo->deleteCarousel();

        $this->assertTrue($delete);
    }

     /** @test */
     public function it_can_update_the_carousel()
     {
            $carousel = factory(Carousel::class)->create();

            $data = [
                'title' => $this->faker->word,
                'link'  => $this->faker->url,
                'src'   => $this->faker->url,
            ];

            $carouselRepo = new CarouselRepository($carousel);
            $update = $carouselRepo->updateCarousel($data);
            $this->assertTrue($update);
            $this->assertEquals($data['title'],$carousel->title);
            $this->assertEquals($data['link'],$carousel->link);
            $this->assertEquals($data['src'],$carousel->src);
     }

     /** @test */
    public function it_can_show_the_carousel()
    {
        $carousel = factory(Carousel::class)->create();
        $carouselRepo = new CarouselRepository(new Carousel);
        $found = $carouselRepo->findCarousel($carousel->id);

        $this->assertInstanceOf(Carousel::class, $found);
        $this->assertEquals($found->title, $carousel->title);
        $this->assertEquals($found->link, $carousel->link);
        $this->assertEquals($found->src, $carousel->src);
    }

    /** @test */
    public function it_can_create_a_carousel()
    {
        $data = [
            'title' => $this->faker->word,
            'link' => $this->faker->url,
            'src' => $this->faker->url,
        ];

        $carouselRepo = new CarouselRepository(new Carousel);
        $carousel = $carouselRepo->createCarousel($data);

        $this->assertInstanceOf(Carousel::class, $carousel);
        $this->assertEquals($data['title'], $carousel->title);
        $this->assertEquals($data['link'], $carousel->link);
        $this->assertEquals($data['src'], $carousel->src);
    }
}

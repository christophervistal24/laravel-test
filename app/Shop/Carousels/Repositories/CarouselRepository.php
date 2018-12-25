<?php
namespace App\Shop\Carousels\Repositories;

use App\Shop\Carousels\Carousel;
use App\Shop\Carousels\Exceptions\CreateCarouselErrorException;
use Illuminate\Database\QueryException;

class CarouselRepository
{
    /**
     * CarouselRepository constructor.
     * @param Carousel $carousel
     */
    public function __construct(Carousel $carousel)
    {
        $this->model = $carousel;
    }

    /**
     * @param array $data
     * @return Carousel
     * @throws CreateCarouselErrorException
     */
    public function createCarousel(array $data) : Carousel
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            throw new CreateCarouselErrorException($e);
        }
    }

    /**
     * @param int $id
     * @return Carousel
     * @throws CarouselNotFoundException
     */

     /**
     * @param int $id
     * @return Carousel
     * @throws CarouselNotFoundException
     */
    public function findCarousel(int $id) : Carousel
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CarouselNotFoundException($e);
        }
    }


     /**
     * @param array $data
     * @return bool
     * @throws UpdateCarouselErrorException
     */
    public function updateCarousel(array $data) : bool
    {
        try {
            return $this->model->update($data);
        } catch (QueryException $e) {
            throw new UpdateCarouselErrorException($e);
        }
    }

    /**
     * @return bool
     */
    public function deleteCarousel() : bool
    {
            return $this->model->delete();
    }
}

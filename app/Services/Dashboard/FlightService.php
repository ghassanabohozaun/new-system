<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FlightRepository;
use App\Utils\ImageManagerUtils;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class FlightService
{
    protected $flightRepository, $imageManagerUtils;
    /**
     * Create a new class instance.
     */
    public function __construct(FlightRepository $flightRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->flightRepository = $flightRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get flight
    public function getFlight($id)
    {
        $flight = $this->flightRepository->getFlight($id);
        if (!$flight) {
            return false;
        }
        return $flight;
    }

    // get flights
    public function getFlights()
    {
        return $this->flightRepository->getFlights();
    }

    // get flights paginated
    public function getFlightsPaginated($perPage = 3, $filters = [])
    {
        return $this->flightRepository->getFlightsPaginated($perPage, $filters);
    }

    // get flight with relation
    public function getFlightsWithRelations($id)
    {
        $flight = $this->flightRepository->getFlightsWithRelations($id);
        if (!$flight) {
            return false;
        }
        return $flight;
    }

    // get active flights
    public function getActiveFlights()
    {
        return $this->flightRepository->getActiveFlights();
    }

    // create flight
    public function createFlight($basicData, $servicesData, $pricesData, $notesData, $offerIncludingData, $offerNotIncludingData, $images)
    {
        try {
            DB::beginTransaction();

            // basic flight data
            $flight = $this->flightRepository->createFlight($basicData);
            if (!$flight) {
                return false;
            }

            // services data
            foreach ($servicesData as $serviceItem) {
                $serviceItem['flight_id'] = $flight->id;
                $service = $this->flightRepository->createFlightService($serviceItem);
                if (!$service) {
                    return false;
                }
            }

            // prices data
            foreach ($pricesData as $priceItem) {
                $priceItem['flight_id'] = $flight->id;
                $price = $this->flightRepository->createFlightPrice($priceItem);
                if (!$price) {
                    return false;
                }
            }

            // notes data
            foreach ($notesData as $noteItem) {
                $noteItem['flight_id'] = $flight->id;
                $note = $this->flightRepository->createFlightNote($noteItem);
                if (!$note) {
                    return false;
                }
            }

            // offerIncluding data
            foreach ($offerIncludingData as $offerIncludingItem) {
                $offerIncludingItem['flight_id'] = $flight->id;
                $offerIncluding = $this->flightRepository->createFlightIncluding($offerIncludingItem);
                if (!$offerIncluding) {
                    return false;
                }
            }

            // offer No Including data
            foreach ($offerNotIncludingData as $offerNotIncludingItem) {
                $offerNotIncludingItem['flight_id'] = $flight->id;
                $offerNotIncluding = $this->flightRepository->createFlightNotIncluding($offerNotIncludingItem);
                if (!$offerNotIncluding) {
                    return false;
                }
            }

            if (!empty($images)) {
                $this->imageManagerUtils->uploadImages($images, $flight, 'flights');
            }

            DB::commit();
            return $flight;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Error Creating Product  : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // update flight
    public function updateFlight($flight, $basicData, $servicesData, $pricesData, $notesData, $offerIncludingData, $offerNotIncludingData, $images)
    {
        try {
            DB::beginTransaction();

            // update flight
            $flightUpdated = $this->flightRepository->updateFlight($flight, $basicData);
            if (!$flightUpdated) {
                return false;
            }

            // delete old services
            $this->flightRepository->deleteAllFlightServices($flight);
            // services data
            foreach ($servicesData as $serviceItem) {
                $serviceItem['flight_id'] = $flight->id;
                $service = $this->flightRepository->createFlightService($serviceItem);
                if (!$service) {
                    return false;
                }
            }

            // delete old prices
            $this->flightRepository->deleteAllFlightPrices($flight);
            // prices data
            foreach ($pricesData as $priceItem) {
                $priceItem['flight_id'] = $flight->id;
                $price = $this->flightRepository->createFlightPrice($priceItem);
                if (!$price) {
                    return false;
                }
            }

            // delete old notes
            $this->flightRepository->deleteAllFlightNotes($flight);
            // notes data
            foreach ($notesData as $noteItem) {
                $noteItem['flight_id'] = $flight->id;
                $note = $this->flightRepository->createFlightNote($noteItem);
                if (!$note) {
                    return false;
                }
            }

            // delete old offer including
            $this->flightRepository->deleteAllFlightIncluding($flight);
            // offer including data
            foreach ($offerIncludingData as $offerIncludingItem) {
                $offerIncludingItem['flight_id'] = $flight->id;
                $offerIncluding = $this->flightRepository->createFlightIncluding($offerIncludingItem);
                if (!$offerIncluding) {
                    return false;
                }
            }

            // delete old offer not including
            $this->flightRepository->deleteAllFlightNotIncluding($flight);
            // offer not including data
            foreach ($offerNotIncludingData as $offerNotIncludingItem) {
                $offerNotIncludingItem['flight_id'] = $flight->id;
                $offerNotIncluding = $this->flightRepository->createFlightNotIncluding($offerNotIncludingItem);
                if (!$offerNotIncluding) {
                    return false;
                }
            }

            //create new image -> old image delete by delete button in front
            if (!empty($images)) {
                $this->imageManagerUtils->uploadImages($images, $flight, 'flights');
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Error Updating Flight  : ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    // destroy flight
    public function destroyFlight($id)
    {
        $flight = self::getFlight($id);
        if (!$flight) {
            return 'not_found';
        }

        if ($flight->reservations()->exists()) {
            return 'restricted';
        }

        foreach ($flight->images as $index => $image) {
            $this->imageManagerUtils->removeImageFromLocal($image->file_name, 'flights');
        }

        $result = $this->flightRepository->destroyFlight($flight);
        return $result ? 'success' : 'failed';
    }

    // change status
    public function changeStatus($id, $status)
    {
        $flight = self::getFlight($id);
        $flight = $this->flightRepository->changeStatus($flight, $status);
        if (!$flight) {
            return false;
        }
        return $flight;
    }

    #################################### flight images ######################################
    // get flight image
    public function getFlightImage($id)
    {
        $image = $this->flightRepository->getFlightImage($id);
        if (!$image) {
            return false;
        }
        return $image;
    }

    // get Flight Images
    public function getFlightImages($flight)
    {
        return $this->flightRepository->getFlightImages($flight);
    }
    // delete flight image
    public function deleteFlightImage($imageId, $imageName)
    {
        $image = self::getFlightImage($imageId);
        if (!$image) {
            return false;
        }
        $this->imageManagerUtils->removeImageFromLocal($imageName, 'flights');
        $image = $this->flightRepository->deleteFlightImage($imageId);
        if (!$image) {
            return false;
        }
        return $image;
    }
}

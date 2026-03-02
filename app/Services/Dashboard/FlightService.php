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

    // get All
    public function getAll($request)
    {
        $flights = $this->flightRepository->getAll($request);

        return DataTables::of($flights)
            ->addIndexColumn()
            ->addColumn('images', function ($flight) {
                return view('dashboard.flights.parts.images', compact('flight'));
            })
            ->addColumn('name', function ($flight) {
                return $flight->getTranslation('name', Lang());
            })
            ->addColumn('country_id', function ($flight) {
                return $flight->country->name;
            })
            ->addColumn('city_id', function ($flight) {
                return $flight->city->name;
            })
            ->addColumn('category_id', function ($flight) {
                return $flight->category->name;
            })
            ->addColumn('reservations_count_total', function ($flight) {
                return $flight->reservations()->count();
            })
            ->addColumn('Last_reservation_date', function ($flight) {
                return $flight->reservations()->latest()->first()->created_at;
            })
            // ->addColumn('new_reservations_count', function ($flight) {
            //     return '3';
            // })
            ->addColumn('status', function ($flight) {
                return view('dashboard.flights.parts.status', compact('flight'));
            })

            ->addColumn('manage_status', function ($flight) {
                return view('dashboard.flights.parts.manage-status', compact('flight'));
            })

            ->addColumn('actions', function ($flight) {
                return view('dashboard.flights.parts.actions', compact('flight'));
            })

            ->make(true);
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
            return true;
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

        foreach ($flight->images as $index => $image) {
            $this->imageManagerUtils->removeImageFromLocal($image->file_name, 'flights');
        }

        $flight = $this->flightRepository->destroyFlight($flight);
        if (!$flight) {
            return false;
        }
        return $flight;
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

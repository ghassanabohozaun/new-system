<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class GlobalSearch extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (mb_strlen($this->search, 'UTF-8') < 2) {
            $this->results = [];
            return;
        }

        $query = mb_strtolower($this->search, 'UTF-8');
        
        $this->results = [
            'pages' => $this->searchPages($query),
            'actions' => $this->searchActions($query),
            'data' => $this->searchData($query),
        ];
    }

    private function searchPages($query)
    {
        $pages = [
            ['name' => __('navbar.countries'), 'url' => route('dashboard.addresses.countries.index'), 'icon' => 'mdi-earth'],
            ['name' => __('navbar.cities'), 'url' => route('dashboard.addresses.cities.index'), 'icon' => 'mdi-city'],
            ['name' => __('navbar.reservations'), 'url' => route('dashboard.reservations.index'), 'icon' => 'mdi-calendar-check'],
            ['name' => __('navbar.tickets'), 'url' => route('dashboard.tickets.index'), 'icon' => 'mdi-ticket-percent'],
            ['name' => __('navbar.flights'), 'url' => route('dashboard.flights.index'), 'icon' => 'mdi-airplane'],
            ['name' => __('navbar.tours'), 'url' => route('dashboard.tours.index'), 'icon' => 'mdi-map-marker-radius'],
            ['name' => __('navbar.categories'), 'url' => route('dashboard.categories.index'), 'icon' => 'mdi-shape'],
            ['name' => __('navbar.admins'), 'url' => route('dashboard.admins.index'), 'icon' => 'mdi-shield-account'],
            ['name' => __('navbar.settings'), 'url' => route('dashboard.settings.index'), 'icon' => 'mdi-cog-outline'],
        ];

        return array_values(array_filter($pages, function($page) use ($query) {
            return str_contains(mb_strtolower($page['name'], 'UTF-8'), $query);
        }));
    }

    private function searchActions($query)
    {
        $actions = [
            ['name' => __('navbar.add_country'), 'url' => route('dashboard.addresses.countries.create'), 'icon' => 'mdi-plus-circle-outline'],
            ['name' => __('navbar.add_city'), 'url' => route('dashboard.addresses.cities.create'), 'icon' => 'mdi-plus-box-outline'],
            ['name' => __('navbar.add_flight'), 'url' => route('dashboard.flights.create'), 'icon' => 'mdi-airplane-plus'],
            ['name' => __('navbar.add_tour'), 'url' => route('dashboard.tours.create'), 'icon' => 'mdi-map-marker-plus'],
            ['name' => __('navbar.add_user'), 'url' => route('dashboard.admins.create'), 'icon' => 'mdi-account-plus-outline'],
        ];

        return array_values(array_filter($actions, function($action) use ($query) {
            return str_contains(mb_strtolower($action['name'], 'UTF-8'), $query);
        }));
    }

    private function searchData($query)
    {
        $data = [];

        // Search Countries
        $countries = \App\Models\Country::where(function($q) use ($query) {
            $q->where('name->ar', 'like', "%$query%")
              ->orWhere('name->en', 'like', "%$query%");
        })->limit(3)->get();

        foreach ($countries as $country) {
            $data[] = [
                'name' => $country->name,
                'url' => route('dashboard.addresses.countries.index', ['search' => $country->name]),
                'icon' => 'mdi-earth',
                'type' => __('navbar.country')
            ];
        }

        // Search Cities
        $cities = \App\Models\City::where(function($q) use ($query) {
            $q->where('name->ar', 'like', "%$query%")
              ->orWhere('name->en', 'like', "%$query%");
        })->limit(3)->get();

        foreach ($cities as $city) {
            $data[] = [
                'name' => $city->name,
                'url' => route('dashboard.addresses.cities.index', ['search' => $city->name]),
                'icon' => 'mdi-city',
                'type' => __('navbar.city')
            ];
        }

        // Search Flight Tickets
        $tickets = \App\Models\FlightTicket::where(function($q) use ($query) {
            $q->where('title->ar', 'like', "%$query%")
              ->orWhere('title->en', 'like', "%$query%")
              ->orWhere('details->ar', 'like', "%$query%")
              ->orWhere('details->en', 'like', "%$query%");
        })->limit(3)->get();

        foreach ($tickets as $ticket) {
            $data[] = [
                'name' => $ticket->title,
                'url' => route('dashboard.tickets.index', ['search' => $ticket->title]),
                'icon' => 'mdi-ticket-percent',
                'type' => __('navbar.ticket')
            ];
        }

        // Search Reservations (Tickets/Clients)
        $reservations = \App\Models\Reservation::where(function($q) use ($query) {
            $q->where('client_name', 'like', "%$query%")
              ->orWhere('id', 'like', "%$query%");
        })->limit(5)->get();
            
        foreach ($reservations as $reservation) {
            $data[] = [
                'name' => $reservation->client_name . " (#{$reservation->id})",
                'url' => route('dashboard.reservations.index', ['search' => $reservation->id]),
                'icon' => 'mdi-ticket-confirmation-outline',
                'type' => __('navbar.reservation')
            ];
        }

        return $data;
    }



    public function render()
    {
        return view('livewire.dashboard.global-search');
    }
}


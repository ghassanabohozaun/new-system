<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style;
use PhpOffice\PhpSpreadsheet\Style\Style as DefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReservationsExport implements WithHeadings, FromQuery, WithMapping, WithColumnWidths, ShouldAutoSize, WithStyles, WithEvents
{
    use RegistersEventListeners;
    public $reservation;

    protected $columns;
    public $request;

    public function __construct($reservation, array $columns, $request)
    {
        $this->reservation = $reservation;
        $this->columns = $columns;
        $this->request = $request;
    }

    public function headings(): array
    {
        // Use the column names as headings

        return array_map(function ($column) {
            return __('reservations.' . $column); // Format for better readability
        }, $this->columns);

        // $headings = [];
        // if (in_array('id', $this->columns)) {
        //     $headings['id'] = __('admins.id');
        // }
        // return $headings;
    }

    public function query()
    {
        return Reservation::with(['flight', 'ticket'])
            ->when(!empty($this->request['flight_id']), function ($query) {
                $query->where('flight_id', $this->request['flight_id']);
            })
            ->when(!empty($this->request['ticket_id']), function ($query) {
                $query->where('ticket_id', $this->request['ticket_id']);
            })
            ->when(!empty($this->request['service']), function ($query) {
                $query->where('service', $this->request['service']);
            })
            ->when(!empty($this->request['economy_class_type']), function ($query) {
                $query->where('economy_class_type', $this->request['economy_class_type']);
            })
            ->when(!empty($this->request['depature_country_id']), function ($query) {
                $query->where('depature_country_id', $this->request['depature_country_id']);
            })

            ->when(!empty($this->request['created_at']), function ($query) {
                $query->whereDate('created_at', $this->request['created_at']);
            })
            ->when(!empty($this->request['depature_date']), function ($query) {
                $query->whereDate('depature_date', $this->request['depature_date']);
            })
            ->when(!empty($this->request['return_date']), function ($query) {
                $query->whereDate('return_date', $this->request['return_date']);
            })

            ->select($this->columns);
    }

    public function map($row): array
    {
        $items = [];
        if (in_array('flight_id', $this->columns)) {
            $items['flight_id'] = $row->flight->name;
        }
        if (in_array('service', $this->columns)) {
            $items['service'] = $row->reservationService();
        }
        if (in_array('client_name', $this->columns)) {
            $items['client_name'] = $row->client_name;
        }
        if (in_array('client_mobile', $this->columns)) {
            $items['client_mobile'] = $row->client_mobile;
        }
        if (in_array('client_email', $this->columns)) {
            $items['client_email'] = $row->client_email;
        }
        if (in_array('client_passport_number', $this->columns)) {
            $items['client_passport_number'] = $row->client_passport_number;
        }
        if (in_array('number_of_adult', $this->columns)) {
            $items['number_of_adult'] = $row->number_of_adult;
        }
        if (in_array('number_of_children', $this->columns)) {
            $items['number_of_children'] = $row->number_of_children;
        }
        if (in_array('number_of_babies', $this->columns)) {
            $items['number_of_babies'] = $row->number_of_babies;
        }
        if (in_array('nationality', $this->columns)) {
            $items['nationality'] = $row->nationality;
        }
        if (in_array('depature_country_id', $this->columns)) {
            $items['depature_country_id'] = $row->depatureCountry->name;
        }
        if (in_array('depature_date', $this->columns)) {
            $items['depature_date'] = $row->depature_date;
        }
        if (in_array('return_date', $this->columns)) {
            $items['return_date'] = $row->return_date;
        }
        if (in_array('ticket_id', $this->columns)) {
            $items['ticket_id'] = $row->ticket->title;
        }
        if (in_array('economy_class_name', $this->columns)) {
            $items['economy_class_name'] = $row->economy_class_name;
        }
        if (in_array('economy_class_type', $this->columns)) {
            $items['economy_class_type'] = $row->reservationEconomyClassType();
        }

        return $items;
    }

    public function columnWidths(): array
    {
        return [
            'B' => 30,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // return [
        //     '1' => ['font' => ['bold' => true]],
        // ];
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet
            ->getStyle('B1:B' . $sheet->getHighestRow())
            ->getAlignment()
            ->setWrapText(true);
    }

    /**
     * @return array|void
     */
    public function defaultStyles(DefaultStyles $defaultStyle)
    {
        return [
            'font' => [
                'name' => 'Calibri',
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => Style\Alignment::VERTICAL_CENTER,
            ],
        ];
    }

    public static function afterSheet(AfterSheet $event)
    {
        $direction = Lang() == 'ar' ? true : false;
        return $event->sheet->getDelegate()->setRightToLeft($direction);
    }
}

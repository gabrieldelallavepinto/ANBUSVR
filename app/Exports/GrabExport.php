<?php

namespace App\Exports;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Grab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class GrabExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(Request $request)
    {
        $this->project_id = $request['project_id'];
    }

    public function map($grab): array
    {
        return [
            $grab->project->name,
            date("Y-m-d H:i:s"),
            $grab->participant ? $grab->participant->name : "",
            $grab->participant ? $grab->participant->age : "",
            $grab->participant ? $grab->participant->gender : "",
            $grab->item->name,
            $grab->number,
            $grab->timeStart,
            $grab->timeEnd,
        ];
    }

    public function headings(): array
    {
        return [
            'Nombre Proyecto',
            'Fecha Exportación',
            'Nombre',
            'Edad',
            'Genero',
            'Nombre Objeto',
            'Numero de la observacion',
            'tiempo comienzo',
            'tiempo final',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Grab::where('project_id', $this->project_id)->get();
    }

}

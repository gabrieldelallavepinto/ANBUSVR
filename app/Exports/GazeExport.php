<?php

namespace App\Exports;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Gaze;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class GazeExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(Request $request)
    {
        $this->project_id = $request['project_id'];
    }

    public function map($gaze): array
    {
        return [
            $gaze->project->name,
            date("Y-m-d H:i:s"),
            $gaze->participant ? $gaze->participant->name : "",
            $gaze->participant ? $gaze->participant->age : "",
            $gaze->participant ? $gaze->participant->gender : "",
            $gaze->item->name,
            $gaze->number,
            $gaze->timeStart,
            $gaze->timeEnd,
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
        return Gaze::where('project_id', $this->project_id)->get();
    }

}

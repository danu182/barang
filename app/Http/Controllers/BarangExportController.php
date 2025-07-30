<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Exports\BarangQueryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class BarangExportController extends Controller
{
    public function export()
    {
        // return "asdasd";
        return Excel::download(new BarangExport, 'barang.xlsx');
    }

    public function query()
    {
        // return "asdasd";
        return Excel::download(new BarangQueryExport, 'query.xlsx');
    }


}

<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportController extends Controller
{

    public function view()
    {
        return view('exports.barang', [
            'barang' => Barang::all()
        ]);
    }

}

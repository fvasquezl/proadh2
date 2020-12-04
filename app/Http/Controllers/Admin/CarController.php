<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CarsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('admin.cars.index');
   }
}

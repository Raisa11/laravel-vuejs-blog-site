<?php

namespace App\Exports;

use App\RegisterPublic;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegisterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RegisterPublic::all();
    }
}

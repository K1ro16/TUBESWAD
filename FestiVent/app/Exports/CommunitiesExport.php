<?php

namespace App\Exports;

use App\Models\Community;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommunitiesExport implements FromCollection
{
    public function collection()
    {
        return Community::all();  // Or add filters/conditions if needed
    }
}



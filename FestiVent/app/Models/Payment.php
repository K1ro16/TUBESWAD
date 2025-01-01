<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'nama',
        'no_tlp',
        'email',
        'jml_tiket',
        'harga',
        'opsi_pay',
        'kode',
        'eventreq_id'
    ];

    public function eventreq()
    {
        return $this->belongsTo(EventReq::class);
    }

    public function promosi()
    {
        return $this->belongsTo(Promosi::class, 'kode');
    }
}

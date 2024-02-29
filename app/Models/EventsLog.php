<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsLog extends Model
{
    protected $table = "events_log";
    protected $fillable = [
        'event_type', 'event_date', 'event_time', 'previous_url', 'ip_address'
    ];

    // Aquí puedes definir relaciones o métodos adicionales según tus necesidades
}

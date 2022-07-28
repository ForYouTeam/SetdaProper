<?php

namespace App\Repositories;

use App\Interfaces\CalendarServiceInterfaces;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class CalendarServiceRepository implements CalendarServiceInterfaces
{
    public function createService(array $newDetail)
    {
        $event = new Event;

        $event->name = $newDetail['nama_kegiatan'];
        $event->startDateTime = Carbon::parse($newDetail['tgl_mulai']);
        $event->endDateTime = Carbon::parse($newDetail['tgl_berakhir']);
        $event->description = '<h5>Keterangan: </h5>' . $newDetail['keterangan'] . '. <br><h5>Pakaian yang digunakan: </h5>' .
            $newDetail['pakaian'] . '.<br><h5>Pejabat menghadiri: </h5>' . $newDetail['penjabat_menghadiri'];
        $event->location = $newDetail['tempat'];
        $event->sendUpdates = 'all';

        $result = $event->save();

        return $result;
    }

    public function updateService($idService, array $newDetail)
    {
        $event = Event::find($idService);

        $result = $event->update([
            'name' => $newDetail['nama_kegiatan'],
            'startDateTime' => Carbon::parse($newDetail['tgl_mulai']),
            'endDateTime' => Carbon::parse($newDetail['tgl_berakhir']),
            'description' => '<h5>Keterangan: </h5>' . $newDetail['keterangan'] . '. <br><h5>Pakaian yang digunakan: </h5>' .
                $newDetail['pakaian'] . '.<br><h5>Pejabat menghadiri: </h5>' . $newDetail['penjabat_menghadiri'],
            'location' => $newDetail['tempat'],
            'sendUpdates' => 'all'
        ]);

        return $result;
    }

    public function deleteService($idService)
    {
        $event = Event::find($idService);
        $result = $event->delete();
        $event->sendUpdates = 'all';

        return $result;
    }
}

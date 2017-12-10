<?php
namespace App\Observers;

use App\Models\Album;

class AlbumObserver
{

    protected $events = [
        ['eloquent.created: App\Models\Album', 'created'],
        ['eloquent.deleted: App\Models\Album', 'deleted']
    ];
    /**
     * Listen to the Album created event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function created(Album $album)
    {
        $album = 
    }

    /**
     * Listen to the Album deleted event.
     *
     * @param  \App\Models\Album  $album
     * @return void
     */
    public function deleted(Album $album)
    {
        //
    }
}
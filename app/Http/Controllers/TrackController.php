<?php
namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Album;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tracks = Track::all();

        $results = [];
         foreach ($tracks as $key => $track) {
             $results = $this->trackFormatter($track);
         }
         return $results;    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tracks  $tracks
     * @return \Illuminate\Http\Response
     */
    public function show(Tracks $tracks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tracks  $tracks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracks $tracks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tracks  $tracks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracks $tracks)
    {
        //
    }
    protected function trackFormatter($album){

        return [
            'Track' => [
                        'id'   => $track->id,
                        'name' => $track->name,
                        'path' => $track->path,
            ],
            'Album' => [
                        'id' => $track->album->id,
                        'name' => $track->album->name,
                        // 'created by' => $album->created_by,
                        // 'updated by' => $album->updated_by,
            ],
            'created_by' => $track->created_by,
            'updated_by' => $track->updated_by
        ];
    }
}

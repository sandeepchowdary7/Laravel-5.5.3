<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        $results = [];
         foreach ($albums as $key => $album) {
             $results = $this->albumFormatter($album);
         }
         return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::where('id',$id)->find($id);
        return albumFormatter($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $album = Album::where('id',$id)->findOrFail($id);
         $album = new Album;
         $album->name = Input::get('name');

         return $album;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums = [];
        foreach(glob('C:\Users\konas\Desktop\deepu/*') as $doc)
            {   
                 $filename = basename($doc); 
                  $albums[] = [ 'name' => $filename ];
            }
            if(!(DB::table('albums')->where('name', '=', $albums)->first())){ 
                DB::table('albums')->delete($albums);
                return 'deleted';
            } else {
             //DB::table('albums')->insert($albums);
             return 'saved'; 
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveAlbums()
    { 
        $albums = [];
        foreach(glob('C:\Users\konas\Desktop\deepu/*') as $doc)
            {   
                 $filename = basename($doc);  
                 // To Remove file extension
                 $filename = preg_replace("/\.[^.]+$/", "", $filename);
                  $albums[] = [ 'name' => $filename ];
            }
            if(DB::table('albums')->where('name', '=', $albums)->first()){ 
                return 'Album name is already in DB';
            } else {
             DB::table('albums')->insert($albums);
             return 'saved'; 
            }
    }

    public function deleteAlbums()
    { 
        dd('test');
        $albums = [];
        foreach(glob('C:\Users\konas\Desktop\deepu/*') as $doc)
            {   
                 $filename = basename($doc);  
                 // To Remove file extension
                 $filename = preg_replace("/\.[^.]+$/", "", $filename);
            } 
            
            if (!(file_exists($filename))->first()){
               DB::table('albums')->delete($filename);
               return 'deleted'; 
            }
    }

    protected function albumFormatter($album){

        return [
            'Album' => [
            'id' => $album->id,
            'name' => $album->name,
            'created by' => $album->created_by,
            'updated by' => $album->updated_by,
            ]
        ];
    }
}

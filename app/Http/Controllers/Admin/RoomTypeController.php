<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomType::all();
        return view('admin.roomtype.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = RoomType::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'price' => $request->price
        ]);

        if($request->hasFile('imgs')) {
           foreach($request->imgs as $img) {
                $imageName = time().'.'.$img->extension();
                $img->move(public_path('images'), $imageName);   
                Roomtypeimage::create([
                    'room_type_id' => $data->id,
                    'img_src' => $imageName,
                    'img_alt' => $data->title
                ]);
           }
         }
       
        return redirect('admin/roomtype/create')->with('success', 'Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = RoomType::find($id);
        return view('admin.roomtype.edit', compact('edit'));
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
        $update = RoomType::find($id);
        $update->update([
            'title' => $request->title,
            'detail' => $request->detail,
            'price' => $request->price
        ]);

        return redirect('admin/roomtype')->with('success', 'Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::where('id', $id)->delete();
        return redirect('admin/roomtype')->with('success', 'Data has been deleted.');
    }
}

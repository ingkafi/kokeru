<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\DB;



class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roomAdmin()
    {
        $users = DB::table('users')->where('name', auth()->user()->name)->get();
        $rooms = DB::table('rooms')->get()->sortBy('nama_ruang');
        return view('admin/room', ['rooms' => $rooms, 'users' => $users]);
    }

    public function roomPetugas()
    {
        // $rooms = DB::table('rooms')->get();
        $rooms = DB::table('rooms')->where('petugas', auth()->user()->name)->get();
        return view('petugas/room', ['rooms' => $rooms]);
    }
    public function dashAdmin()
    {
        $users = DB::table('users')->where('name', auth()->user()->name)->get();
        return view('admin/index', ['users' => $users]);
    }
    public function dashPetugas()
    {
        return view('petugas/index');
    }
    public function showfoto(Room $room)
    {
        $room = DB::table('rooms')->where('id_ruang', $room->id_ruang)->get();
        return view('admin/foto', compact('room'));
    }
    public function showfotoPetugas(Room $room)
    {
        $room = DB::table('rooms')->where('id_ruang', $room->id_ruang)->get();
        return view('petugas/foto', compact('room'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room = DB::table('rooms')->where('id_ruang', $room->id_ruang)->first();
        return view('petugas.edit', compact('room'));
    }
    public function adminshow(Room $room, User $user)
    {
        $room = DB::table('rooms')->where('id_ruang', $room->id_ruang)->first();
        $user = User::select('id', 'name')->where('is_admin', null)->get();
        return view('admin.edit', compact('user', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */

    public function createForm()
    {
        return redirect('/petugas/room');
    }

    public function update(Request $request, Room $room)
    {
        Room::where('id_ruang', $room->id_ruang)
            ->update([
                'status' => $request->status,
                'nama_ruang' => $room->nama_ruang,
            ]);

        $request->validate([
            'foto_bukti' => 'required|max:5',
            'foto_bukti.*' => 'mimes:jpeg,jpg,png,mp4,mov,wmv,avi'
        ]);

        if ($request->hasfile('foto_bukti')) {
            foreach ($request->file('foto_bukti') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/foto_bukti/', $name);
                $imgData[] = $name;
            }
            $room->foto_bukti = json_encode($imgData);
            $room->save();
            return redirect('/petugas/room')->with('room', $room);
        }
    }



    public function adminupdate(Request $request, Room $room)
    {
        Room::where('id_ruang', $room->id_ruang)
            ->update([
                'petugas' => $request->petugas,
                'gedung' => $request->gedung,
            ]);
        return redirect('/admin/room');
    }

    public function resetStatus(Room $room)
    {
        Room::where('id_ruang', $room->id_ruang)
            ->update([
                'status' => 'BELUM',
                'foto_bukti' => null,

            ]);
        return redirect('/admin/room');
    }

    public function resetAllStatus(Room $room)
    {
        $rooms = DB::table('rooms')
            ->update([
                'status' => 'BELUM',
                'foto_bukti' => null,
            ]);
        return redirect('/admin/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}

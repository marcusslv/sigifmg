<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getData()
    {
        $users= User::all();
        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return [
                    'edit'   => route('admin.user.edit', $users),
                    'delete' => route('admin.user.delete', $users),
                    'status' => $users->status,
                ];
            })
            ->make(true);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request,[
        //     'titulo' => 'required'
        // ]);

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->save();
        return response()->json([
            "status" => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->status) {
            $user->update(['status'=> 0]);
        } else {
            $user->update(['status'=> 1]);
        }
        
        
        return response()->json([
            "status" => true
        ]);
    }
}

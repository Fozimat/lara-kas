<?php

namespace App\Http\Controllers;

use App\Http\Requests\KasMasukRequest;
use App\Models\Cash;
use App\Models\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Cash::query();
            return DataTables::of($data)
                ->addColumn('action', function ($action) {
                    return '
                    <a href="#" class="btn btn-primary">Edit</a>
                        <button type="button" class="btn btn-danger">Hapus</button
                        ';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make('true');
        }

        return view('pages.pemasukan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('pages.pemasukan.create', compact(['types']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KasMasukRequest $request)
    {
        $data = $request->all();
        Cash::create($data);
        return redirect()->route('pemasukan.index')->with('status', 'Data berhasil ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

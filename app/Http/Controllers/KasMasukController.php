<?php

namespace App\Http\Controllers;

use App\Http\Requests\KasMasukRequest;
use App\Models\Cash;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            $data = Cash::where('type_id', 1)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($action) {
                    return '
                    <a href="' . route('pemasukan.edit', $action->id) . '" class="btn btn-primary pull-left" style="margin-right:10px">Edit</a>
                    <form action="' . route('pemasukan.destroy', $action->id) . '" method="POST">
                    ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" onclick="return showConfirm()" class="btn btn-danger">Hapus</button
                    </form>
                        ';
                })
                ->editColumn('date', function ($item) {
                    return $item->date ? with(new Carbon($item->date))->isoFormat('D MMMM Y') : '';
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
    public function edit(Cash $cash)
    {
        return view('pages.pemasukan.edit', compact(['cash']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KasMasukRequest $request, Cash $cash)
    {
        $cash->update($request->all());
        return redirect()->route('pemasukan.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cash $cash)
    {
        $cash->delete();
        return redirect()->route('pemasukan.index')->with('status', 'Data berhasil dihapus');
    }
}

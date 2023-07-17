<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\PmhnpRequest;

class PmhnpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $pmhnps= User::all();
        // $pmhnps = User::orderBy('id','desc')->paginate(5);
        $pmhnps = User::where('is_admin', null)->orderBy('id', 'desc')->paginate(10);
        // dd($pmhnps);
        return view('Admin.pmhnps.index', compact('pmhnps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Admin.pmhnps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PmhnpRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PmhnpRequest $request)
    {
        $pmhnp = new User;
		$pmhnp->name = $request->input('name');
		$pmhnp->email = $request->input('email');
        $pmhnp->save();

        return to_route('pmhnps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $pmhnp = User::findOrFail($id);
        return view('Admin.pmhnps.show',['pmhnp'=>$pmhnp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $pmhnp = User::findOrFail($id);
        return view('Admin.pmhnps.edit',['pmhnp'=>$pmhnp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PmhnpRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PmhnpRequest $request, $id)
    {
        $pmhnp = User::findOrFail($id);
		$pmhnp->name = $request->input('name');
		$pmhnp->email = $request->input('email');
        $pmhnp->save();

        return to_route('pmhnps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pmhnp = User::findOrFail($id);
        $pmhnp->delete();

        return to_route('pmhnps.index');
    }
}

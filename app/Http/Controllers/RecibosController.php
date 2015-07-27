<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ReciboStoreRequest;
use App\Http\Requests\ReciboUpdateRequest;
use App\Http\Controllers\Controller;

use App\Models\Recibo;

class RecibosController extends Controller
{
	/**
     * The user repository instance.
     */
    protected $recibo;
	
	/**
     * Constructor.
     *
     * @param Recibo $recibo
     */
    public function __construct(Recibo $recibo)
    {
		$this->recibo = $recibo;
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		// get all the recibo
		$recibos = $this->recibo->orderBy('id', 'desc')->paginate(10);
		
		// load the view and pass the recibo
		return view('recibos.index')->with('recibos', $recibos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		// load the create form (app/views/accounts/create.blade.php)
		return view('recibos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  ReciboStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(ReciboStoreRequest $request)
	{
		// store
		Recibo::create($request->all());
		
		// Redirect
		return redirect()->route('recibos.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function show($id)
	{
		// get all the recibo
		$recibo = $this->clien->where('id', '=', $id)->first();
		
		// load the view and pass the recibo
        return view('recibos.show')->with('recibo', $recibo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		// get all the recibo
		$recibo = $this->clien->where('id', '=', $id)->first();
		
		// load the view and pass the recibo
        return view('recibos.show')->with('recibo', $recibo);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  ReciboUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(ReciboUpdateRequest $request, $id)
	{
		// Find
		$recibos = $this->recibo->findOrFail($id);
		
		// Update
		$recibos->update($request->all());
		
		// Redirect
        return redirect()->route('recibos.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		// Find - Delete
		$recibos = $this->recibo->find($id)->delete();
		
		// load the view and pass the recibo
		return view('recibos.index');
	}
}

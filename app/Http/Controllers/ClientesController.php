<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Controllers\Controller;

use App\Models\Cliente;

class ClientesController extends Controller
{
	/**
     * The user repository instance.
     */
    protected $cliente;
	
	/**
     * Constructor.
     *
     * @param Cliente $cliente
     */
    public function __construct(Cliente $cliente)
    {
		$this->cliente = $cliente;
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		// get all the cliente
		$clientes = $this->cliente->orderBy('id', 'desc')->paginate(10);
		
		// load the view and pass the cliente
		return view('clientes.index')->with('clientes', $clientes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		// load the create form (app/views/accounts/create.blade.php)
		return view('clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  ClienteStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(ClienteStoreRequest $request)
	{
		// store
		Cliente::insert($request->all());
		
		// Redirect
		return redirect()->route('clientes.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function show($id)
	{
		// get all the cliente
		$cliente = $this->clien->where('id', '=', $id)->first();
		
		// load the view and pass the cliente
        return view('clientes.show')->with('cliente', $cliente);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		// get all the cliente
		$cliente = $this->clien->where('id', '=', $id)->first();
		
		// load the view and pass the cliente
        return view('clientes.show')->with('cliente', $cliente);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  ClienteUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(ClienteUpdateRequest $request, $id)
	{
		// Find
		$clientes = $this->cliente->findOrFail($id);
		
		// Update
		$clientes->update($request->all());
		
		// Redirect
        return redirect()->route('clientes.show', $id);
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
		$clientes = $this->cliente->find($id)->delete();
		
		// load the view and pass the cliente
		return view('clientes.index');
	}
}

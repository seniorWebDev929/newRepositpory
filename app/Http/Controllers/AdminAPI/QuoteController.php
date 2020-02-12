<?php

namespace App\Http\Controllers\AdminAPI;

use App\Quote;
use App\Http\Resources\AdminAPI\Quote as QuoteResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::where('status', '!=', 'hidden')
        ->orderBy('id', 'desc')
        ->paginate(50);

        return QuoteResource::collection($quotes);
    }

    /**
     * Hide quote
     *
     * @param Request $request
     * @return void
     */
    public function hide(Request $request)
    {
        $quote = Quote::find($request->id);
        if ($request->status === 'hidden') {
            $quote->status = $request->status;
        }
        $quote->save();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

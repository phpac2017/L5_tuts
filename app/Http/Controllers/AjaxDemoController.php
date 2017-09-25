<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AjaxDemoController extends Controller
{
    
    /**

     * Show the application myform.

     *

     * @return \Illuminate\Http\Response

     */

    public function myform()

    {

        $countries = DB::table('countries')->lists("name","id");
        //echo "<pre>";print_r($countries);exit;

        return view('myform',compact('countries'));

    }


    /**

     * Show the application selectAjax.

     *

     * @return \Illuminate\Http\Response

     */

    public function selectAjax(Request $request)

    {

        if($request->ajax()){

            $states = DB::table('states')->where('id_country',$request->id_country)->lists("name","id");

            $data = view('ajax-select',compact('states'))->render();

            return response()->json(['options'=>$data]);

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

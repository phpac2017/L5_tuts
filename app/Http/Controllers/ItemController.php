<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use PDF;
use App\Item;

class ItemController extends Controller
{
    

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function pdfview(Request $request)

    {

        $items = DB::table("items")->get();

        view()->share('items',$items);


        if($request->has('download')){

            $pdf = PDF::loadView('pdfview');

            return $pdf->download('pdfview.pdf');

        }


        return view('pdfview');

    }


    public function exportPDF()

    {

       $data = Item::get()->toArray();
       //echo"<pre>";print_r($data);exit;

       return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

        $excel->sheet('mySheet', function($sheet) use ($data)

        {

            $sheet->fromArray($data);

        });

       })->download("pdf");

    }

        public function importExport()

    {

        return view('importExport');

    }

    public function downloadExcel($type)

    {

        $data = DB::table("items")->get()->toArray();

        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }

    public function importExcel()

    {

        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {

            })->get();

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {

                    $insert[] = ['title' => $value->title, 'description' => $value->description];

                }

                if(!empty($insert)){

                    DB::table('items')->insert($insert);

                    dd('Insert Record successfully.');

                }

            }

        }

        return back();

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

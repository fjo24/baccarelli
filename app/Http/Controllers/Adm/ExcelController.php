<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Observacion;
use App\Item;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function importExport()
	{
		return view('adm.materiales.import');
	}
	public function downloadExcel($type)
	{
		$data = Observacion::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcell(Request $request)
	{
			
		if($request->HasFile('import_file')){
			$path = public_path($request->HasFile('import_file'));
//$data = Excel::load($path, function($reader) {})->get();
			$data = Excel::load($path('import_file'), function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['costo' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('observaciones')->insert($insert);
					dd('Insert Record successfully.');
				}else{
					dd('Fallo');
				}
			}
		}
		return back();
	}
}

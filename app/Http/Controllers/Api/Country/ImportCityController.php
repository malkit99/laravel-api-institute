<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CityImportStoreRequest;
use App\Http\Requests\Country\CityStoreRequest;
use App\Imports\Country\CityImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class ImportCityController extends Controller
{
    public function importCity(CityImportStoreRequest $request){
        if($request->hasFile('select_file')){
            $file = $request->file('select_file');
            $original_name = $file->getClientOriginalName();
            $file_name = rand(1,1000).'_'.date('Ymdhis').'.'.$original_name;
            $file_path = public_path('/storage/import_excel_file/');
            $file = $file->move($file_path , $file_name);
         }

         // upload data in database state table
         Excel::import(new CityImport, $file );

         return response(['message' => 'upload excel file successfully'], Response::HTTP_ACCEPTED);
    }
}

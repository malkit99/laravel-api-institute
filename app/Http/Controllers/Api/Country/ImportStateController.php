<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StateImportStoreRequest;
use App\Imports\Country\StateImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class ImportStateController extends Controller
{
    public function importState(StateImportStoreRequest $request)
    {
        if($request->hasFile('select_file')){
            $file = $request->file('select_file');
            $original_name = $file->getClientOriginalName();
            $file_name = rand(1,1000).'_'.date('Ymdhis').'.'.$original_name;
            $file_path = public_path('/storage/import_excel_file/');
            $file = $file->move($file_path , $file_name);
         }

         // upload data in database state table
         Excel::import(new StateImport, $file );

         return response(['message' => 'upload excel file successfully'], Response::HTTP_ACCEPTED);
    }
}

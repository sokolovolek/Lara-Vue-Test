<?php

namespace App\Imports;

use Auth,DB,Hash;
use Exception;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class AlumnisImport implements ToCollection,WithHeadingRow
{
    use SkipsFailures;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        $userid = Auth::user()->id;
        $myinstitution = DB::table('public.institutions')->where('user_id','=',$userid)->first();

        foreach ($collections as $collection) 
        {
            DB::table($myinstitution->schema_name.'.alumnis')->insert([
                'id_number'=>$collection['id_number'],
                'name'=>$collection['names'],
                'email'=>$collection['email'],
                'reg_no'=>$collection['registration_number'],
                'start_year'=>$collection['start_year'],
                'graduation_year'=>$collection['graduation_year'],
                'course'=>$collection['course'],
                'level_of_education'=>$collection['level_of_education'],
                'phone_number'=>$collection['phone_number'],
                'password'=>Hash::make($collection['registration_number']),
                'created_at'=>now(),
            ]);

            

        }
    
    }
}

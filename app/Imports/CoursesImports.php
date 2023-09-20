<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Auth;
use Exception;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
// use Maatwebsite\Excel\Concerns\SkipsOnError;

class CoursesImports implements ToCollection, WithHeadingRow
{
    use importable;
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
            //check if the course do exist
            // $course =  DB::table($myinstitution->name.'.courses')->where('name','=',$collection['course_name'])->first();

            // if($course){
            //     return back()->with('error-message','course'. '  ' .$collection['course_name']. ' '.'do exist');
            //     continue;
            // }

            DB::table($myinstitution->schema_name.'.courses')->insert([
                'name'=>$collection['course_name'],
                'duration'=>$collection['duration'],
                'created_at'=>now(),
            ]);

        }
    
    
    }

    // /**
    //  * @param Failure[] $failures
    //  */
    // public function onFailure(Failure ...$failures)
    // {
    //     // Handle the failures how you'd like.
    // }

    // public function rules()
    
}

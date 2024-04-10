<?php

namespace App\Http\Controllers;

use App\Exports\FormDataExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    public function form()

    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        // lets validate the form
        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
            ]
        );
        // writr the code for save the data in excel
        // save the data into excel
        Excel::store(new FormDataExport($validatedData), 'form_data.xlsx');

        // redirect to form
        return redirect()->back()->with('successfully saved !');
    }
}

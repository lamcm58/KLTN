<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Survey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(20);

        return view('admin.subject.list', compact('subjects'));
    }

    public function add()
    {
        return view('admin.subject.add');
    }

    public function importExcel(Request $request)
    {
        if ($request->hasFile('subject_file')) {
            $path = $request->file('subject_file')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                foreach ($data->toArray() as $key => $value) {
                    if (!empty($value)) {
                        Subject::create($value);
                    }
                }
                return back()->with('success', 'Insert Record successfully.');
            }
        }
        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }

    public function detail($id)
    {
        $subject = Subject::find($id);
        $selected = Survey::find($subject->survey_id);
        $surveys = Survey::all();

        return view('admin.subject.detail', compact('subject','selected', 'surveys'));
    }

    public function addSurvey($id, Request $request)
    {
        $subject = Subject::find($id);
        $survey_id = $request->survey_id;
        if (is_numeric($survey_id)) {
            $subject->survey_id = $survey_id;
            $subject->save();

            return back()->with('success', 'Add survey successfully.');
        }
    }
}

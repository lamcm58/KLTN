<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('admin.survey.list', compact('surveys'));
    }

    public function add()
    {
        $subjects = Subject::all();
        return view('admin.survey.add', compact('subjects'));
    }

    public function importFile(Request $request)
    {
        if ($request->hasFile('text_file')) {
            $file = $request->file('text_file');
            $content = file_get_contents($file);
            $str = explode(';', $content);

            // Create survey
            $survey = [];
            $survey['survey_code'] = $str[0];
            $survey['survey_name'] = $str[1];
            $survey['expired_day'] = date('Y-m-d 23:59:59', strtotime($str[2]));
            $save = Survey::create($survey);
            if ($save) {
                $id = $save->id;
                // Create questions
                for ($i = 3; $i < sizeof($str); $i++) {
                    $questions = [];
                    $temp = substr($str[$i], 3, (strlen($str[$i]) - 4));
                    $result = explode('-', $temp);
                    $questions['question_code'] = $result[0];
                    $questions['question_type'] = (integer)$result[1];
                    $questions['question_content'] = $result[2];
                    $questions['answer'] = isset($result[3]) ? $result[3] : null;
                    $questions['survey_id'] = $id;

                    Question::create($questions);
                }

                // update subject
                if ($request->all == "on") {
                    $subjects = Subject::all();
                    foreach ($subjects as $subject) {
                        $subject->survey_id = $id;
                        $subject->save();
                    }
                }
            }
            return back()->with('success', 'Add survey successful.');
        }
        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }

    public function create(Request $request)
    {
        $survey = Survey::orderBy('id', 'DESC')->first();
        if (isset($survey)) {
            $ordinal = $survey->id + 1;
        } else {
            $ordinal = 1;
        }
        $surveys = [];
        $surveys['survey_code'] = 'SS' . str_pad($ordinal, 4, '0', STR_PAD_LEFT);
        $surveys['survey_name'] = $request->survey_name;
        $surveys['expired_day'] = date('Y-m-d 23:59:59', strtotime($request->expired_day));
        $save = Survey::create($surveys);

        if ($save) {
            $id = $save->id;
            if ($request->check_all == "on") {
                $subjects = Subject::all();
                foreach ($subjects as $subject) {
                    $subject->survey_id = $id;
                    $subject->save();
                }
            } elseif (is_numeric($request->subject_id)) {
                $subject = Subject::find($request->subject_id);
                $subject->survey_id = $id;
                $subject->save();
            }
            return back()->with('success', 'Add survey successful.');
        }
        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }

    public function preview($id)
    {
        $item = Survey::find($id);
        $questions = Question::where('survey_id', $id)->get();

        return view('admin.survey.preview', compact('item', 'questions'));
    }

    public function doSurvey(Request $request, $id)
    {
        $data = $request->all();
        $count = 0;
        foreach ($data as $item) {
            if ($item != null) {
                $count += 1;
            }
        }

        if ($count == count($data)) {
            unset($data['_token']);
            dd(serialize($data));
        } else {
            dd($data);
        }
    }

    public function detail($id)
    {
        $item = Survey::find($id);
        $questions = Question::where('survey_id', $id)->get();

        return view('admin.survey.detail', compact('item', 'questions'));
    }
}

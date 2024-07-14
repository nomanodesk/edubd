<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\Operator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentProfile::orderBy('id', 'desc')->where('institution_id', Auth::user()->Institution->id)->simplepaginate(100);
        return view('admin.student.liststudent', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operators = Operator::all();
        return view('admin.student.createstudent', compact('operators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $request->validate([

                'studentName' => 'required',
                'address' => 'required',
                // 'operator_id' => 'required',
            ]);
            $validator = Validator::make($request->all(), [
                'contactNo' => 'required|validnumber|min:11|unique:student_profiles',
            ]);
            if ($validator->fails()) {
                return back()->withErrors(["error" => "Please Enter a valid Robi/Airtel/Banglalink number"])->withInput();
            }
            $contact = $request->input('contactNo');
            $firstThreeDigits = substr($contact, 0, 3);
            $operator = '';
            if ($firstThreeDigits == '018') {
                $operator = "Robi";
            } else if ($firstThreeDigits == '019') {
                $operator = "Banglalink";
            }
            $input = $request->all();
          
            if ($image = $request->file('studentImage')) {
                $path = public_path('studentImages/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                $profileImage = time() . '.' . $request->studentImage->extension();
                Image::make($request->file('studentImage'))
                    ->resize(100, 100)
                    ->save($path . $profileImage);
                $input['studentImage'] = "$profileImage";
            } else {
                unset($input['image']);
            }
            // StudentProfile::create($input);
            $data = new StudentProfile;
            $data->institution_id = $request->input('institution_id');
        $data->studentName = $request->input('studentName');
        $data->address = $request->input('address');
        $data->contactNo =$request->input('contactNo');
        $data->operator_id = $operator;
        if($image!=NULL){
            $data->studentImage = $profileImage;
        }
       
        $data->save();

            return redirect()->route('student_profiles.index')->with('success', 'Student Data added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}

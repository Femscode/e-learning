<?php

namespace App\Http\Controllers;

use App\Models\Assigndocument;
use App\Models\Assignfolder;
use App\User;
use App\Test;
use App\Result;
use App\Models\Credential;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function destroy(Request $request) {
        
        $id = $request->id;
        $user = User::find($id);
        $user->delete();

    }
    public function test()
    {
        $authUser = Auth::user()->id;
        $assignedTestId = [];
        $user = DB::table('test_users')->where('user_id', $authUser)->latest()->get();
        foreach ($user as $u) {
            array_push($assignedTestId, $u->test_id);
        }
        $data['tests'] = Test::whereIn('id', $assignedTestId)->latest()->get();

        $data['isTestAssigned'] = DB::table('test_users')->where('user_id', $authUser)->exists();
        $data['wasTestCompleted'] = $good = Result::where('user_id', $authUser)->whereIn('test_id', (new Test)->hasTestAttempted())->pluck('test_id')->toArray();

        // $data['wasTestCompleted'] = Result::where('user_id',$authUser)->where('test_id',$test_id)->get();

        return view('dashboard.usertest', $data);
    }
    public function getregisteruser(Request $request) { 
    
    $user = User::where('email', $request->email)->first();
    return $user;
    }
    public function userdashboard() {
        $user = Auth::user();
        if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null && $user->job_title !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 100;
            $data['preferenceprogress'] = 100;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null && $user->school !== null) {
            $data['personalprogress'] = 100;
            $data['preferenceprogress'] = 100;
            $data['experienceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null && $user->referral_name !== null) {
            $data['personalprogress'] = 100;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else if ($user->name !== null && $user->nok_name !== null) {
            $data['personalprogress'] = 65;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        } else {
            $data['personalprogress'] = 25;
            $data['experienceprogress'] = 0;
            $data['preferenceprogress'] = 0;
        }
       
        $authUser = Auth::user()->id;
        $assignedTestId = [];
        $user2 = DB::table('test_users')->where('user_id', $authUser)->latest()->get();
        foreach ($user2 as $u) {
            array_push($assignedTestId, $u->test_id);
        }
        $data['tests'] = Test::whereIn('id', $assignedTestId)->latest()->get();

        $data['isTestAssigned'] = DB::table('test_users')->where('user_id', $authUser)->exists();
        $data['wasTestCompleted'] = $good = Result::where('user_id', $authUser)->whereIn('test_id', (new Test)->hasTestAttempted())->pluck('test_id')->toArray();
        $data['files'] = Assigndocument::where('user_id',$authUser)->get();
        $data['folders'] = Assignfolder::where('user_id',$authUser)->get();
        

        $data['user'] = Auth::user();
      
        return view('dashboard.userdashboard', $data);
    }
    public function userdashboard2() {
        $data['user'] = Auth::user();
        // $data['tests'] = Tes
        return view('dashboard.userdashboard2', $data);
    }
    public function personalinformation(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'min:6'],
            'phone' => ['required', 'min:11', 'max:12'],
            'address' => ['required', 'min:6'],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i', 'min:6'],
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
    }
    public function nokinformation(Request $request)
    {
        $this->validate($request, [
            'nok_name' => ['required', 'min:6'],
            'nok_address' => ['required', 'min:6'],
            'nok_phone' => ['required', 'min:11', 'max:12'],
            'nok_email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i', 'min:6'],
        ]);
        $user = Auth::user();
        $user->nok_name = $request->nok_name;
        $user->nok_email = $request->nok_email;
        $user->nok_address = $request->nok_address;
        $user->nok_phone = $request->nok_phone;
        $user->save();
        dd('saved');
    }
    public function accountinformation(Request $request)
    {
        $this->validate($request, [
            'referral_name' => ['required', 'min:6'],
            'referral_source' => ['required', 'min:6'],

        ]);
        $user = Auth::user();
        $user->referral_name = $request->referral_name;
        $user->referral_source = $request->referral_source;
        $user->save();
        dd('saved');
    }
    public function workpreference(Request $request)
    {
        $this->validate($request, [
            'date_available' => ['required', 'min:6'],
            'position_type' => ['required', 'min:6'],

        ]);
        $user = Auth::user();
        $user->date_available = $request->date_available;
        $user->position_type = $request->position_type;

        $user->save();
        dd('saved');
    }
    public function shiftpreference(Request $request)
    {
        $this->validate($request, [
            'shift' => ['required', 'min:6'],
            'distance' => ['required', 'min:3'],

        ]);
        $user = Auth::user();
        $user->shift = $request->shift;
        $user->distance = $request->distance;

        $user->save();
        dd('saved');
    }
  
    public function educationinformation(Request $request)
    {
        // $this->validate($request, [
        //     'school' => ['required', 'min:6'],
        //     'school_address' => ['required', 'min:6'],
        //     'course' => ['required', 'min:6'],
        //     'degree' => ['required', 'min:3'],
        //     'enrollment_year' => ['required', 'min:6'],
        //     'graduation_year' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $user_id = $user->id;
        
        $count = count($request->school);
        for($i = 0; $i <= $count - 1; ++$i) {
            
        DB::insert('insert into education (user_id,school,school_address,course,degree,enrollment_year,graduation_year) values (?,?,?,?,?,?,?)', 
        array($user_id,$request->school[$i],$request->school_address[$i],$request->course[$i],$request->degree[$i],$request->enrollment_year[$i],$request->graduation_year[$i]));
        }
        dd('good');
        $user->school = $request->school;
        $user->school_address = $request->school_address;
        $user->course = $request->course;
        $user->degree = $request->degree;
        $user->enrollment_year = $request->enrollment_year;
        $user->graduation_year = $request->graduation_year;
        $user->save();
        dd('saved');
    }
    public function workinformation(Request $request)
    {
        // $this->validate($request, [
        //     'facility_name' => ['required', 'min:6'],
        //     'start_date' => ['required', 'min:6'],
        //     'street_address' => ['required', 'min:6'],
        //     'city' => ['required', 'min:6'],
        //     'postal_code' => ['required', 'min:6'],
        //     'job_title' => ['required', 'min:6'],
        //     'unit' => ['required', 'min:3'],
        //     'unit_beds' => ['required', 'min:3'],
        //     'patient_ratio' => ['required', 'min:2'],
        // ]);
        $user = Auth::user();
        $user_id = $user->id;
        // dd($request->all());
        $count = count($request->facility_name);
        for($i = 0; $i <= $count - 1; ++$i) {
            
            DB::insert('insert into work (user_id,facility_name,start_date,street_address,city,postal_code,job_title) values (?,?,?,?,?,?,?)', 
            array($user_id,$request->facility_name[$i],$request->start_date[$i],$request->street_address[$i],$request->city[$i],$request->postal_code[$i],$request->job_title[$i]));
            }
            dd('good');
        $user->facility_name = $request->facility_name;
        $user->start_date = $request->start_date;
        $user->street_address = $request->street_address;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->job_title = $request->job_title;
        $user->unit = $request->unit;
        $user->unit_beds = $request->unit_beds;
        $user->patient_ratio = $request->patient_ratio;
        $user->save();
        dd('saved');
    }
    public function resumeinformation(Request $request)
    {
        $this->validate($request, [
            'resume' => ['required', 'min:6'],

        ]);
        $user = Auth::user();
        $file = $request->resume;



        $fileName = $file->hashName();
        $file->move(public_path('resume'), $fileName);

        $user->resume = $fileName;




        $user->save();
        dd('saved');
    }
    public function downloadresume($id)
    {
        $user = User::find($id);
        return response()->download(public_path() . "/resume/" . $user->resume);
    }
    public function downloadlicense($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->licenses_image);
    }
    public function downloadclientspecific($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->client_specific_image);
    }
    public function downloadpreemployment($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->pre_employment_image);
    }
    public function downloadcertifications($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->certfications_image);
    }
    public function downloadmedical($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->medical_image);
    }
    public function downloadtrainings($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->trainings_image);
    }
    public function downloadadditionalcert($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->additional_cert_image);
    }
    public function downloadbackgroundchecks($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->background_checks_image);
    }
    public function downloadhr($id)
    {$user = Credential::find($id);
       return response()->download(public_path() . "/credentials/" . $user->hr_image);
    }

    public function reference()
    {
    }
    public function uploaddocument(Request $request, $id)
    {

        // $this->validate($request, [
        //     'file' => ['required','mimes:jpeg,docx,pdf'],
        // ]);

        // dd($request->files);
        foreach ($request['files'] as $file) {



            $data['folder'] = $folder =  Folder::find($id);
            $path = public_path() . '\parentfolder';
            // $path = public_path().'\parentfolder/'.$folder;
            // $newpath = File::makeDirectory($path, $mode = 0777, true, true);

            $fileName = $file->hashName();
            //    dd($file);
            $file->move(public_path('parentfolder'), $fileName);
            //   $checkfile = File::where('name', $file->getClientOriginalName())->get();
            //   if(!$checkfile->isEmpty()) {
            //   } else {
            File::create([
                'folder_id' => $folder->id,
                'value' => $fileName,
                'name' => $file->getClientOriginalName(),
            ]);
            // }
        }
        return redirect()->back()->with('message', 'Files uploaded successfully');
    }
    public function savelicenses(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'licenses_license' => ['required', 'min:6'],
        //     'licenses_state' => ['required', 'min:6'],
        //     'licenses_expiration' => ['required', 'min:6'],
        //     'licenses_image' => ['required', 'min:6'],
        //     'licenses_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'licenses_license' => $request->licenses_license,
                'licenses_state' => $request->licenses_state,
                'licenses_expiration' => $request->licenses_expiration,
                'licenses_license_number' => $request->licenses_license_number,
                'licenses_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->licenses_license = $request->licenses_license;
            $credentials->licenses_state = $request->licenses_state;
            $credentials->licenses_expiration = $request->licenses_expiration;
            $credentials->licenses_license_number = $request->licenses_license_number;
            $credentials->licenses_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function saveclientspecific(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'client_specific_license' => ['required', 'min:6'],
        //     'client_specific_state' => ['required', 'min:6'],
        //     'client_specific_expiration' => ['required', 'min:6'],
        //     'client_specific_image' => ['required', 'min:6'],
        //     'client_specific_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'client_specific_certification' => $request->client_specific_certification,
                // 'client_specific_state' => $request->client_specific_state,
                'client_specific_expiration' => $request->client_specific_expiration,
                'client_specific_license_number' => $request->client_specific_license_number,
                'client_specific_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->client_specific_certification = $request->client_specific_certification;
            // $credentials->client_specific_state = $request->client_specific_state;
            $credentials->client_specific_expiration = $request->client_specific_expiration;
            $credentials->client_specific_license_number = $request->client_specific_license_number;
            $credentials->client_specific_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savepreemployment(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'pre_employment_license' => ['required', 'min:6'],
        //     'pre_employment_state' => ['required', 'min:6'],
        //     'pre_employment_expiration' => ['required', 'min:6'],
        //     'pre_employment_image' => ['required', 'min:6'],
        //     'pre_employment_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'pre_employment_license' => $request->pre_employment_license,
                'pre_employment_state' => $request->pre_employment_state,
                'pre_employment_expiration' => $request->pre_employment_expiration,
                'pre_employment_license_number' => $request->pre_employment_license_number,
                'pre_employment_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->pre_employment_license = $request->pre_employment_license;
            $credentials->pre_employment_state = $request->pre_employment_state;
            $credentials->pre_employment_expiration = $request->pre_employment_expiration;
            $credentials->pre_employment_license_number = $request->pre_employment_license_number;
            $credentials->pre_employment_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savecertifications(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'certifications_license' => ['required', 'min:6'],
        //     'certifications_state' => ['required', 'min:6'],
        //     'certifications_expiration' => ['required', 'min:6'],
        //     'certifications_image' => ['required', 'min:6'],
        //     'certifications_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'certifications_license' => $request->certifications_license,
                'certifications_state' => $request->certifications_state,
                'certifications_expiration' => $request->certifications_expiration,
                'certifications_license_number' => $request->certifications_license_number,
                'certifications_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->certifications_license = $request->certifications_license;
            $credentials->certifications_state = $request->certifications_state;
            $credentials->certifications_expiration = $request->certifications_expiration;
            $credentials->certifications_license_number = $request->certifications_license_number;
            $credentials->certifications_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savemedical(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'medical_license' => ['required', 'min:6'],
        //     'medical_state' => ['required', 'min:6'],
        //     'medical_expiration' => ['required', 'min:6'],
        //     'medical_image' => ['required', 'min:6'],
        //     'medical_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'medical_license' => $request->medical_license,
                'medical_state' => $request->medical_state,
                'medical_expiration' => $request->medical_expiration,
                'medical_license_number' => $request->medical_license_number,
                'medical_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->medical_license = $request->medical_license;
            $credentials->medical_state = $request->medical_state;
            $credentials->medical_expiration = $request->medical_expiration;
            $credentials->medical_license_number = $request->medical_license_number;
            $credentials->medical_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savetrainings(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'trainings_license' => ['required', 'min:6'],
        //     'trainings_state' => ['required', 'min:6'],
        //     'trainings_expiration' => ['required', 'min:6'],
        //     'trainings_image' => ['required', 'min:6'],
        //     'trainings_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'trainings_license' => $request->trainings_license,
                'trainings_state' => $request->trainings_state,
                'trainings_expiration' => $request->trainings_expiration,
                'trainings_license_number' => $request->trainings_license_number,
                'trainings_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->trainings_license = $request->trainings_license;
            $credentials->trainings_state = $request->trainings_state;
            $credentials->trainings_expiration = $request->trainings_expiration;
            $credentials->trainings_license_number = $request->trainings_license_number;
            $credentials->trainings_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function saveadditionalcerts(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'additional_certs_license' => ['required', 'min:6'],
        //     'additional_certs_state' => ['required', 'min:6'],
        //     'additional_certs_expiration' => ['required', 'min:6'],
        //     'additional_certs_image' => ['required', 'min:6'],
        //     'additional_certs_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'additional_certs_license' => $request->additional_certs_license,
                'additional_certs_state' => $request->additional_certs_state,
                'additional_certs_expiration' => $request->additional_certs_expiration,
                'additional_certs_license_number' => $request->additional_certs_license_number,
                'additional_certs_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->additional_certs_license = $request->additional_certs_license;
            $credentials->additional_certs_state = $request->additional_certs_state;
            $credentials->additional_certs_expiration = $request->additional_certs_expiration;
            $credentials->additional_certs_license_number = $request->additional_certs_license_number;
            $credentials->additional_certs_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savebackgroundchecks(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'background_checks_license' => ['required', 'min:6'],
        //     'background_checks_state' => ['required', 'min:6'],
        //     'background_checks_expiration' => ['required', 'min:6'],
        //     'background_checks_image' => ['required', 'min:6'],
        //     'background_checks_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'background_checks_license' => $request->background_checks_license,
                'background_checks_state' => $request->background_checks_state,
                'background_checks_expiration' => $request->background_checks_expiration,
                'background_checks_license_number' => $request->background_checks_license_number,
                'background_checks_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->background_checks_license = $request->background_checks_license;
            $credentials->background_checks_state = $request->background_checks_state;
            $credentials->background_checks_expiration = $request->background_checks_expiration;
            $credentials->background_checks_license_number = $request->background_checks_license_number;
            $credentials->background_checks_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }
    public function savehr(Request $request) {
        // dd($request->all());
        $file = $request->license_image;
        $fileName = $file->hashName();
        $file->move(public_path('credentials'), $fileName);
      
        // $this->validate($request, [
        //     'hr_license' => ['required', 'min:6'],
        //     'hr_state' => ['required', 'min:6'],
        //     'hr_expiration' => ['required', 'min:6'],
        //     'hr_image' => ['required', 'min:6'],
        //     'hr_license_number' => ['required', 'min:6'],
        // ]);
        $user = Auth::user();
        $check = Credential::where('user_id', $user->id)->get();
        if($check->isEmpty()) {
            Credential::create([
                'user_id' => $user->id,
                'hr_license' => $request->hr_license,
                'hr_state' => $request->hr_state,
                'hr_expiration' => $request->hr_expiration,
                'hr_license_number' => $request->hr_license_number,
                'hr_image' => $fileName,
            ]);

        }
        else {
            $id = Credential::where('user_id', $user->id)->pluck('id')->first();
            $credentials = Credential::find($id);
           
            $credentials->hr_license = $request->hr_license;
            $credentials->hr_state = $request->hr_state;
            $credentials->hr_expiration = $request->hr_expiration;
            $credentials->hr_license_number = $request->hr_license_number;
            $credentials->hr_image = $fileName;
           
           $credentials->save();

        }
        return "saved successfully";
        

    }

}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Schedule;

use Illuminate\Support\Facades\Auth;
use App\Models\Assigndocument;
use App\Models\Assignfolder;
use App\Models\Folder;
use App\Models\File;
use App\Models\UploadedDocument;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use File;
class AdminController extends Controller
{
    public function makeAdmin(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->isAdmin = 1;
        $user->save();
        return $user;
    }
    public function makeUser(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $user = User::find($id);
        $user->isAdmin = 0;
        $user->save();
        return $user;
    }
    public function access_control(Request $request)
    {
        $this->validate($request, [
            'access_type' => ['required'],
            'user_id' => ['required']
        ]);
        // dd($request->all());
        if ($request->access_type == 'user') {
            foreach ($request->user_id as $user) {
                $theuser = User::find($user);
                $theuser->isAdmin = 0;
                $theuser->save();
            }
        } elseif ($request->access_type == 'admin') {
            foreach ($request->user_id as $user) {
                $theuser = User::find($user);
                $theuser->isAdmin = 1;
                $theuser->save();
            }
        } else {
            foreach ($request->user_id as $user) {
                $theuser = User::find($user);
                $theuser->isAdmin = 2;
                $theuser->save();
            }
        }
        return redirect()->back()->with('message', 'Access assigned to user successfully');
    }
    public function access()
    {
        $data['users'] = User::get();
        $data['active'] = 'access';
        return view('admin.accesslist', $data);
        return view('dashboard.access', $data);
    }
    public function showUserDetails(Request $request)
    {
        $user = User::find($request->id);
        $schedule = Schedule::where('user_id', $request->id)->where('status', 1)->latest()->get();
        return [$user, $schedule];
    }
    //folder function goes here
    public function adminfolder()
    {
        $data['folder'] = Folder::first();
        $data['folders'] = Folder::latest()->paginate(10);
        return view('admin.folder', $data);
        return view('dashboard.folder', $data);
    }
    public function adminfile($id)
    {
        $data['folder'] = $folder =  Folder::find($id);
        $data['files'] = File::where('folder_id', $folder->id)->latest()->get();
        return view('admin.file', $data);
        return view('dashboard.file', $data);
    }
    public function createfolder(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'min:8', 'max:200'],
        ]);
        $folder = Folder::where('name', $request->name)->pluck('name');

        if (!$folder->isEmpty()) {
            return redirect()->back()->with('error', 'Folder name already existed');
        } else {
            Folder::create([
                'name' => $request->name
            ]);
        }
        return 'good';
        return redirect()->back()->with('message', 'Folder Created Successfully, you can proceed in creating file in the ' . $request->name . ' folder');
    }
    public function createFile(Request $request, $id)
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
    public function assignpage($id)
    {
        $data['folder'] = $folder = Folder::find($id);
        $data['files'] = File::where('folder_id', $folder->id)->get();

        return view('admin.assignpage', $data);
        return view('dashboard.assigndocument', $data);
    }
    public function assignfolder($id)
    {
        $data['folder'] = $folder = Folder::find($id);
        $data['files'] = File::where('folder_id', $folder->id)->get();

        return view('admin.assignfolder', $data);
        return view('dashboard.assignfolder', $data);
    }

    public function deletefile(Request $request)
    {
        $id = $request->id;
        $file = File::find($id);
        $file->delete();
        return redirect()->back()->with('message', "File deleted successfully");
    }
    public function deletefolder(Request $request)
    {
        $id = $request->id;
        $folder = Folder::find($id);
        $files = File::where('folder_id', $folder->id)->get();
        foreach ($files as $file) {
            $fileD = File::find($file->id);
            $fileD->delete();
        }
        $folder->delete();
        return redirect()->back()->with('message', "Folder deleted successfully");
    }


    public function assigndocument(Request $request)
    {
        $documents = $request->documentId;
        $users = $request->userId;
        // dd($documents,$users);
        foreach ($documents as $dI) {
            $document = File::find($dI);
            foreach ($users as $uI) {
                $user = User::find($uI);
                $assignexist = Assigndocument::where('document_id', $document->id)->where('user_id', $user->id)->first();
                if ($assignexist) {
                } else {
                    Assigndocument::create([
                        'document_id' => $document->id,
                        'user_id' => $user->id
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'Document Assigned Successfully');
    }
    public function assignfolderdocument(Request $request)
    {
        $folders = $request->folderId;
        $users = $request->userId;
        // dd($documents,$users);
        foreach ($folders as $dI) {
            $folder = Folder::find($dI);
            foreach ($users as $uI) {
                $user = User::find($uI);
                $assignexist = Assignfolder::where('folder_id', $folder->id)->where('user_id', $user->id)->first();
                if ($assignexist) {
                } else {


                    Assignfolder::create([
                        'folder_id' => $folder->id,
                        'user_id' => $user->id
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'Folder Assigned Successfully');
    }
    public function userdocument($id)
    {
        $data['user'] = $user = User::find($id);
        $data['assigndocuments'] = $assigned = Assigndocument::where('user_id', $user->id)->pluck('document_id');
        // dd($assigned);
        $data['assignedfolders'] = $assignedFolder =  AssignFolder::where('user_id', $user->id)->pluck('folder_id');
        $data['documents'] = $documents = File::whereIn('id', $assigned)->latest()->get();
        $data['folders'] = $folders = Folder::whereIn('id', $assignedFolder)->latest()->get();



        return view('dashboard.userdocument', $data);
    }
    public function folderdocument($id)
    {
        $data['folder'] = $folder = Folder::find($id);
        $data['files'] = $files = File::where('folder_id', $folder->id)->latest()->get();
        return view('dashboard.folderdocument', $data);
    }

    public function download($id)
    {
        $document = File::find($id);
        return response()->download(public_path() . "/parentfolder/" . $document->value);
    }
    public function updatePic(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'mimes:jpeg,jpg,png']
        ]);
        $user = Auth::user();
        $image = $request->image;
        $hashImage = $image->hashName();
        $image->move(public_path() . '/profilePic', $hashImage);
        $user->image = $hashImage;
        $user->save();
        return redirect()->back()->with('message', 'Profile Picture Updated Successfully');
    }
    public function userfolder()
    {
        return view('admin.userfolder');
        return view('dashboard.userfolder');
    }
    public function uploadeddocument($id) {
        $data['user'] = User::find($id);
       $data['files'] =  UploadedDocument::where('user_id', $id)->get();
        return view('admin.userdocument', $data);
    }
    public function downloaduploadeddocument($id) {
        $document = UploadedDocument::find($id);
        return response()->download(public_path() . "/uploadeddocument/" . $document->value);

    }
    public function createuploadeddocument(Request $request) {
      
        // $this->validate($request, [
        //     'file' => ['required','mimes:jpeg,docx,pdf'],
        // ]);

        // dd($request->files);
        $id = Auth::user()->id;
        foreach ($request['files'] as $file) {



            $path = public_path() . '\uploadeddocument';
            // $path = public_path().'\parentfolder/'.$folder;
            // $newpath = File::makeDirectory($path, $mode = 0777, true, true);

            $fileName = $file->hashName();
            //    dd($file);
            $file->move(public_path('uploadeddocument'), $fileName);
            //   $checkfile = File::where('name', $file->getClientOriginalName())->get();
            //   if(!$checkfile->isEmpty()) {
            //   } else {
            UploadedDocument::create([
                'user_id' => $id,
                'value' => $fileName,
                'name' => $file->getClientOriginalName(),
            ]);
            // }
        }
        return redirect()->back()->with('message', 'Files uploaded successfully');
    
    }
    public function usersideuploadeddocument() {
        $id = Auth::user()->id;
        $data['files'] =  UploadedDocument::where('user_id', $id)->get();
        return view('dashboard.usersideuploadeddocument', $data);
    }
    public function useruploadedfolder()
    {
        

        return view('admin.useruploadedfolder');
    }
    public function listuserdocument($id)
    {
        $data['user'] = $user = User::find($id);
        $data['assignfolders'] = $assignfolder = Assignfolder::where('user_id', $user->id)->pluck('folder_id');
        $data['assignfiles'] = $assignfiles = Assigndocument::where('user_id', $user->id)->pluck('document_id');
        $data['folders'] = Folder::whereIn('id', $assignfolder)->latest()->get();
        
        $data['files'] = File::whereIn('id', $assignfiles)->latest()->get();

        return view('admin.userfile', $data);
        return view('dashboard.listuserdocument', $data);
    }
    public function detachfile($userId, $id)
    {

        $file = Assigndocument::where('user_id', $userId)->where('document_id', $id)->first();


        $file->delete();
        return redirect()->back()->with('success', 'File has been detached from user successfully');
    }
    public function detachfolder($userId, $id)
    {
        $folder = Assignfolder::where('user_id', $userId)->where('folder_id', $id)->first();

        $folder->delete();
        return redirect()->back()->with('success', 'File has been detached from user successfully');
    }
    public function view($id)
    {

        $document = File::find($id);
        return response()->download(public_path() . "/parentfolder/" . $document->value);
    }
    public function schedule()
    {
        $data['users'] = User::get();
        $data['active'] = 'schedule';
        return view('dashboard.schedule', $data);
    }
    public function adminsortschedule(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'month' => ['required'],
            'week' => ['required']
        ]);
        $data['active'] = 'schedule';
        $data['schedules'] = Schedule::where('user_id', $request->user_id)->where('schedule_month', $request->month)->where('schedule_week', $request->week)->paginate(10);
        return view('dashboard.schedulelist', $data);
    }
    public function schedulelist()
    {
        $data['schedules'] = Schedule::latest()->get();
        $data['active'] = 'schedule';
        return view('dashboard.schedulelist', $data);
    }
    public function calenderSchedule()
    {
        $schedule = Schedule::where('user_id', Auth::user()->id)->get();
        return Response($schedule->toJson());
        return $schedule;
    }

    public function allcalenderschedule()
    {
        $schedule = Schedule::get();
        return Response($schedule->toJson());
        return $schedule;
    }
    public function admincalendar()
    {
        $data['users'] = User::get();
        $data['schedule'] = Schedule::get();
        return view('dashboard.admincalendar', $data);
    }
    public function markschedule($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 1;
        $schedule->color = '#28a745';
        // dd($schedule);
        $schedule->save();
        return redirect()->back()->with('message', 'Schedule Marked Done Successfully');
    }
    public function unmarkschedule($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = 0;
        $schedule->color = '#dc3545';
        // dd($schedule);
        $schedule->save();
        return redirect()->back()->with('message', 'Schedule Disapprove Done Successfully');
    }
    public function pendschedule($id)
    {
        $schedule = Schedule::find($id);
        if ($schedule->status == 1) {
            return redirect()->back()->with('message', 'Schedule Is On Pending');
        } else {
            $schedule->status = 2;
            $schedule->color = '#ffc107';
            // dd($schedule);
            $schedule->save();
        }
        return redirect()->back()->with('message', 'Schedule Is On Pending');
    }
    public function deleteschedule($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->back()->with('message', 'Schedule deleted successfully');
    }

    public function scheduletask(Request $request)
    {
        $this->validate($request, [
            //   'id[]' => 'required',
            'schedule_title' => ['required', 'min:3'],

            'schedule_start_time' => ['required'],
            'schedule_description' => ['required', 'string', 'min:8'],
            'schedule_end_time' => ['required']

        ]);

        foreach ($request->userId as $id) {
            $user = User::find($id);
            $username = $user->name;
            // foreach($request->schedule_month as $month) {
            //     foreach($request->schedule_week as $week) {
            //         foreach($request->schedule_day as $day) {

            foreach ($request->schedule_date as $date) {
                $carbon = new Carbon($date);
                $month = $carbon->month();
                $day = $carbon->day();
                $year = $carbon->year();
                echo ($carbon);
                Schedule::create([
                    'user_id' => $user->id,
                    'schedule_title' =>  $request->schedule_title,
                    'schedule_description' =>  $request->schedule_description,
                    'schedule_month' => $month,
                    'schedule_week' => $year,
                    'schedule_day' => $day,
                    'schedule_date' => $date,
                    'username' => $username,
                    'schedule_start_time' => $request->schedule_start_time,
                    'schedule_end_time' => $request->schedule_end_time
                ]);
            }
            //     }
            // }

        }

        return redirect()->back()->with('message', 'Schedule assigned to users successfully');
    }
}

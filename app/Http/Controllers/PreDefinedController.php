<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Carbon;
use Cache;

class PreDefinedController extends Controller
{
    //check user email
    public function checkUserMail($emailId){
        $user = User::where(['email'=>$emailId])->first();
        return $user;
    }

    //get role name
    public function getRoleName($roleId){
        $role = User::select('users.role','roles.name as role_name')->join('roles','roles.id','=','users.role')->where('roles.id',$roleId)->first();
        return $role;
    }

    //time - seconds
    public function secondsToTime($inputSeconds) {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;

        // Extract days
        $days = floor($inputSeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
            'hour' => (int)$hours,
            'minute' => (int)$minutes,
            'second' => (int)$seconds,
        ];

        foreach ($sections as $name => $value){
            if ($value > 0){
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        //return implode(', ', $timeParts);
        return $timeParts;
    }

    public function time_elapsed_string($getDateTime)
    {
        $estimate_time = time() - $getDateTime;
        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

    //check user online or offline
    public function checkUserStatusOnOff($userId)
    {
        return Cache::has('user-is-online-'.$userId);
    }

    //file upload
    public function uploadFile($request,$inputName,$filePath, $valid_extensions = null)
    {
        if($request->hasfile($inputName)){
            $filepath = 'uploads/'.$filePath.'/';

            $file = $request->file($inputName);
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            $filename = time().'_'.$filename;
            $file->move($filepath,$filename);
            return $filepath.$filename;
        }else{
            return null;
        }
    }

    //multi upload files
    public function multiUploadFiles($request,$inputname,$folderpath)
    {
        $images = [];
        $filepath = 'public/uploads/'.$folderpath.'/';
        if($request->hasfile($inputname)){
            $files = $request->file($inputname);
            //$allowedfileExtension=['pdf','jpg','png','docx'];
            foreach($files as $k => $file){
                //$filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $filename = time().'RD'.rand(1,999).'.'.$extension;
                $file->move($filepath, $filename);
                $images[$k] = $filepath. $filename;
            }
        }
        return $images;
    }
}

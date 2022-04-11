<?php

namespace App\Methods\ReusableMethods;

use Carbon\Carbon;
use App\Account;
use Response;
use App\ReplacementAccount;
use URL;

class DownloadAccountMethod {

    public function download($category, $used) {
        // prepare content

        $logs = Account::where('category', $category)->where('used', $used)->get();

        $url = URL::to("/");

        $content = $category.'_'.Carbon::today()->toDateString()."\n";
        foreach ($logs as $log) {
          $content .= $url."/netflix/".$log->code_link;
          $content .= "\n";
        }

    
        // file name that will be used in the download
        $fileName = $category.' '.Carbon::today()->toDateString().'.txt';
    
        // use headers in order to generate the download
        $headers = [
          'Content-type' => 'text/plain', 
          'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];

        return [
            'content' => $content,
            'headers' => $headers
        ];
    
        // make a response, with the content, a 200 response code and the headers
        
    }

    public function downloadReplacement($category, $used) {
        // prepare content
        $logs = ReplacementAccount::where('category', $category)->where('used', $used)->get();

        $content = 'replacement_'.$category.'_'.Carbon::today()->toDateString()."\n";
        foreach ($logs as $log) {
          $content .= $log->email.':'.$log->password;
          $content .= "\n";
        }
    
        // file name that will be used in the download
        $fileName = 'replacement_'.$category.'_'.Carbon::today()->toDateString().'.txt';
    
        // use headers in order to generate the download
        $headers = [
          'Content-type' => 'text/plain', 
          'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
    
        // make a response, with the content, a 200 response code and the headers
        return [
            'content' => $content,
            'headers' => $headers
        ];
    }
}
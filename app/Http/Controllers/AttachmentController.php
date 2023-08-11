<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Attachment $attachment)
    {
  

        return Storage::download($attachment->file_path);

    }
}

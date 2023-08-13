<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $requests= Request::paginate(7);
         $requests=Request::paginate(7);
         $request_pure=Request::all();
          $request_number=(clone $request_pure)->count();
          $pending_number=(clone $request_pure->where("status","pending"))->count();
          $approved_number=(clone $request_pure->where("status","approved"))->count();
          $rejected_number=(clone $request_pure->where("status","rejected"))->count();
        return view('management.index',compact("requests","request_number","pending_number","approved_number","rejected_number"));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $files=$request->attachments;
        foreach ($files as  $file) {
            $file["link"]=URL::signedRoute('attachments.download', ['attachment' => $file->id]);
         }
        return view('management.manage',compact("request","files"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $UPrequest, Request $request)
    {
        $validated=$UPrequest->validate([
            "status"=>"required|in:approved,rejected",
            "reason"=>"nullable|string|max:255"
        ]);

        $request->update($validated);

        
        return redirect()->route("management.index")->with("success","The decision has been made 👌");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
          
        $request->deleteAttachments();
        $request->delete();


        return redirect()->route("management.index")->with("success","The request has been deleted 😇");
    }
    public function employees()
    {
          $employees=User::where("role","empolyee")->paginate(7);
        


        return view("management.employees",compact("employees"));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use Illuminate\Http\Request as HttpRequest;
use App\Models\Type;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests=Request::paginate(7);
        $request_pure=Request::all();
         $request_number=(clone $request_pure)->count();
         $pending_number=(clone $request_pure->where("status","pending"))->count();
         $approved_number=(clone $request_pure->where("status","approved"))->count();
         $rejected_number=(clone $request_pure->where("status","rejected"))->count();
      
        return view('requests.index',compact(['requests',"request_number","pending_number","approved_number","rejected_number"]));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $types=Type::all();
        return view("requests.create",compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestRequest $request)
    {




    
     $validated=$request->validated();

    
     $validated["employee_id"]=Auth::id();
  $leave_request= Request::create($validated);


  $leave_request->uploadAttachments($request);



     return redirect()->route("requests.index")->with("success","The request has been created 😇");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $files=$request->attachments;
        foreach ($files as  $file) {
           $file["link"]=URL::signedRoute('attachments.download', ['attachment' => $file->id]);
        }
     
        return view("requests.show",compact("request","files"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {   
        $types=Type::all();
        $files=$request->attachments;
        foreach ($files as  $file) {
            $file["link"]=URL::signedRoute('attachments.download', ['attachment' => $file->id]);
         }
        return view("requests.edit",compact("request","types","files"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestRequest $Udrequest, Request $request)
    {
        
        
            $validated=$Udrequest->validated();
            $request->update($validated);
 switch ($Udrequest->input("action")) {
    case 'delete':
        
    $request->deleteAttachments();

        break;
    case 'replace':
        $request->deleteAttachments();
        $request->uploadAttachments($Udrequest);


        break;
    case 'add':
        $request->uploadAttachments($Udrequest);

        break;
    
 
 }


            return redirect()->route("requests.edit",$request->id)->with("success","The request has been updated 😇");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {


        $request->deleteAttachments();
        $request->delete();

        return redirect()->route("requests.index")->with("success","The request has been deleted 😇");

    }








}

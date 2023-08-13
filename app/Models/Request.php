<?php

namespace App\Models;

use App\Enums\RequestStatus;
use App\Models\Scopes\RequestScope;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Storage;

class Request extends Model
{
    use HasFactory;

    protected $table="leave_requests";
    protected $fillable=["employee_id","leaveType_id","duration","description","status","reason","start_date"];


protected $casts=[
   'start_date' => "datetime",
   'status' => RequestStatus::class,
   
];

public  static function  scopeFilter(Builder $query,$serach): void
    {
        $query
        ->where(function (Builder $query2) use ($serach){
                     $query2->where('duration', 'like',"%$serach%")
                     ->orWhere('description', 'like',"%$serach%")
                     ->orWhere('status', 'like',"%$serach%")
                     ->orWhere('start_date', 'like',"%$serach%")
                     ->orWhere('reason', 'like',"%$serach%");
        })->orWhereHas('empolyee', function (Builder $query3) use ($serach) {
          $query3->where('name', 'like', "%$serach%");
     })
        ->orWhereHas('type', function (Builder $query4) use ($serach) {
          $query4->where('type', 'like', "%$serach%");
     })
        
        ;
    }


public function getStartDatesAttribute(){
   return $this->start_date->format("Y-m-d");
}
public function empolyee():BelongsTo {
   return $this->belongsTo(User::class,"employee_id");
}
public function type():BelongsTo {
   return $this->belongsTo(Type::class,"leaveType_id","id");
}
public function attachments():HasMany {
   return $this->hasMany(Attachment::class);
}



protected static function booted ()
{
   static::addGlobalScope(new RequestScope);
}



public function deleteAttachments(){
   foreach ($this->attachments as $attachment) {
       $attachment->delete();
       Storage::delete($attachment->file_path);
     }
}

public function uploadAttachments(HttpRequest $request){
   if($request->hasFile('attachments')){
       $files= $request->file('attachments');

       foreach ($files as $file) {
       
         $path=  $file->store("/attachments");

$this->attachments()->create([
   "file_path"=>$path,
   "name"=>$file->getClientOriginalName()
]);


       }
       }
}










}

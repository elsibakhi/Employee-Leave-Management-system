<?php

namespace App\Models;

use App\Models\Scopes\RequestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Storage;

class Request extends Model
{
    use HasFactory;

    protected $table="leave_requests";
    protected $fillable=["employee_id","leaveType_id","duration","description","status","reason"];



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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained("users","id")->cascadeOnDelete();
            $table->foreignId("leaveType_id")->nullable()->constrained("leave_types","id")->nullOnDelete();
            $table->integer("duration");
            $table->text("description")->nullable();
            $table->enum("status",["pending","approved","rejected"])->default("pending");
            $table->text("reason")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "leaveType_id"=>"nullable|int|exists:leave_types,id",
            "duration"=>"nullable|int",
            "description"=>"nullable|string|max:255",
            "attachments[]"=>"nullable|file|max:900000"
        ];
    }
}
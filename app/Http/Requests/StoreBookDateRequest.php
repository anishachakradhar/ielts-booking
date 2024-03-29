<?php

namespace App\Http\Requests;

use App\BookDate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBookDateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('book_date_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'available_date_id' => [
                'required',
                'string',
            ],
            'student_id' => 
                'required|exists:students,student_id',
            
        ];
    }
}

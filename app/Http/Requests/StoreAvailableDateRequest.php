<?php

namespace App\Http\Requests;

use App\AvailableDate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAvailableDateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('available_date_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'available_date' => [
                'date_format:' . config('panel.date_format'),
                'required',
            ],
        ];
    }
}

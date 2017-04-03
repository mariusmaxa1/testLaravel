<?php namespace App\Http\Requests\Front\Hospital;

use App\Http\Requests\Request;

class UpdateHospitalInformationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'county' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone1' => 'required|max:255',
        ];
    }
}

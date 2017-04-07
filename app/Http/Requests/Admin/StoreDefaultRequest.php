<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StoreDefaultRequest extends Request
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
            'active' => 'required|boolean',
            'mail' => 'required|max:255',   
        ];
    }
}

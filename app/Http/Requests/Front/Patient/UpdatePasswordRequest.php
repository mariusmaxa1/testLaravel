<?php namespace App\Http\Requests\Front\Patient;

use App\Http\Requests\Request;
use Auth;

class UpdatePasswordRequest extends Request
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
        $rules = [
            'password' => 'required|confirmed|min:6',
        ];

        if (!is_null(Auth::user()->password)) {
            $rules['old_password'] = 'required|old_password:' . Auth::user()->password;
        }

        return $rules;
    }
}

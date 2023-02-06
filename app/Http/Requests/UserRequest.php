<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
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
      if(isset(request()->id) && request()->id != ""){
        $user_id = request()->id;
      }else{
        $user_id = "";
      }
      $validation_array = [
        'first_name' => ['required', 'string', 'min:3', 'max:25', 'regex:/^[ A-Za-z,()]*$/'],  
        'last_name' => ['required', 'string', 'min:3', 'max:25', 'regex:/^[ A-Za-z,()]*$/'],  
        'email' => ['required','email',Rule::unique('users')->ignore($user_id, 'id'),'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
        'password'   =>  ['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'min:8', 'confirmed'],
         'password_confirmation' => ['required'],
      ];
      return $validation_array;
    }

    public function messages(){
         return [
            'email.required' => 'The email field is required',
            'password.required' => 'The password field is required',
            'password_confirmation.required' => 'The confirm password field is required',
            'first_name.required'  => 'The first name field is required',
            'last_name.required' => 'The last name field is required',
            'password.regex' => 'Password must have atleast one uppercase,special character,one digit'
        ];
    }

    public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json([
         'success'   => false,
         'message'   => 'Validation errors',
         'data'      => $validator->errors()
       ],400));
    } 
}

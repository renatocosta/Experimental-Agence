<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    
    private $columns_rules;
    
    public function __construct($columns_rules = []){
        $this->columns_rules = $columns_rules;
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }    
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        
        //Filling uncaught parameters to blank default value
        foreach($this->columns_rules as $column => $rules){
            if(empty($this->get($column))) {
              $this->request->add([$column => '']);                
            }
        }

    }      
    
}

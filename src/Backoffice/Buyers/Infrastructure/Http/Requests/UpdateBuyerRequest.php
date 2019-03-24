<?php

namespace Backoffice\Buyers\Infrastructure\Http\Requests;

use App\Http\Requests\BaseRequest;
use Backoffice\Buyers\Domain\Entity\Buyer;

class UpdateBuyerRequest extends BaseRequest
{
    
    public function __construct(){
        parent::__construct(Buyer::$updateRules);
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Buyer::$updateRules;
    }
    
    
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            //'id.required' => 'ID is required!'
        ];
    }    
    
}

<?php

namespace Backoffice\Transactions\Infrastructure\Http\Requests;

use App\Http\Requests\BaseRequest;
use Backoffice\Transactions\Domain\Entity\Transactions;
use Backoffice\Payments\Domain\Entity\Slip;

class CreateSlipTransactionRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  array_merge(Transactions::$createRules, Slip::$createRules);
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

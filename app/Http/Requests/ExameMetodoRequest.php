<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ExameMetodoRequest extends FormRequest
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
            'nome' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'=> 'Descrição é um campo obrigatório',
            'nome.max' => 'Descrição deve conter até :max caracteres'
        ];
    }
}

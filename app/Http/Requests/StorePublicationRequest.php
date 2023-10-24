<?php

namespace App\Http\Requests;

use App\Models\Publication;
use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'in:forum,evenement'],
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'contenu' => ['required', 'string', 'max:65535'],
            'harcelement_id' => ['required', 'numeric', 'exists:harcelements,id'],
        ];
    }
}

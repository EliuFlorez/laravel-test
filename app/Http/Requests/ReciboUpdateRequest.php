<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReciboUpdateRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		//
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'text' => 'required|min:5|max:140',
		];
	}
}

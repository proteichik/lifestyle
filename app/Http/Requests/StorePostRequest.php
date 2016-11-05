<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    const FRONT_PICTURE  = 'front_picture';

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
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'max:700',
        ];
    }

    /**
     * @return array
     */
    public function all()
    {
        $result = [];
        if ($path = $this->saveFrontPicture()) {
            $result[self::FRONT_PICTURE] = $path;
        }
        
        return array_merge_recursive($result, $this->input());
    }

    /**
     * @return bool|false|string
     */
    protected function saveFrontPicture()
    {
        if (!$this->hasFile(self::FRONT_PICTURE)) {
            return false;
        }

        return $this->file(self::FRONT_PICTURE)->storePublicly('public');
    }


}

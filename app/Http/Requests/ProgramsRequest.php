<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ProgramsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    //유효성 검사에서 세션 저장을 하지않을 필드를 정의
    public function rules()
    {   
        return [
            'title' => ['required'],
            'content' => ['required', 'min:1'],
        ];
    }
    public function messages()
    {
        return [
            'required' => '필수 입력 항목입니다.',
            'min' => '최소 :min 글자 이상이 필요합니다.',
            'array' => '배열만 허용합니다.',
            'mimes' => ':values 형식만 허용합니다.',
            'max' => ':max 킬로바이트까지만 허용합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }
}
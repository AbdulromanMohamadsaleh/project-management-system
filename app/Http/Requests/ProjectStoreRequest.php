<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'projectName' => 'required|unique:prj_detail,NAME_PROJECT',
            'reason' => 'string|min:10',
            'objectve' => 'string|min:10',
            'location' => 'string',
            'target' => 'string|min:10',
            'expectedRresults' => 'string|min:10',
            'projectStart' => 'date',
            'projectEnd' => 'date|after:projectStart',
            'category' => 'exists:prj_category,CATEGORY_ID',
            'projectManager' => 'exists:prj_project_login,LOGIN_ID',
            // 'budget' => 'min:0',
            // 'projectDuration' => 'min:0',

            // 'activityName[]' => 'required|min:3',
            // 'taskName[]' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            // 'projectName.required' => 'Project Name is required!',
            // 'reason' => 'string|min:10',
            // 'objectve' => 'string|min:10',
            // 'location' => 'string',
            // 'target' => 'string|min:10',
            // 'expectedRresults' => 'string|min:10',
            // 'projectStart' => 'date',
            // 'projectEnd' => 'date,after:projectStart',
            // 'category' => 'exists:prj_category,CATEGORY_ID',
            // 'projectManager' => 'exists:prj_project_login,LOGIN_ID',
            // // 'budget' => 'min:0',
            // // 'projectDuration' => 'min:0',

            // 'activityName' => 'required|min:3',
            // 'taskName' => 'required|min:3',

        ];
    }
}

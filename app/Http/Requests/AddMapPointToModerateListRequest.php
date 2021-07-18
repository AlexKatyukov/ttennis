<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;

class AddMapPointToModerateListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'num' => [
                'required',
                'integer',
                'min:1',
            ],
            'coordinates' => [
                'required',
                'regex:/^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/',
            ],
            'coverage' => [
                'required',
                Rule::in([
                    'пластик',
                    'дерево',
                    'камень',
                    'неизвестно',
                ]),
            ],
            'type' => [
                'required',
                Rule::in([
                    'уличная',
                    'в помещении',
                ]),
            ],
            'net' => [
                'required',
                Rule::in([
                    'верёвочная',
                    'жёсткая',
                    'есть, тип неизвестен',
                    'отсутствует',
                ]),
            ],
            'light' => [
                'required',
                Rule::in([
                    'есть',
                    'нет',
                    'неизвестно',
                ]),
            ],
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.min' => 'Имя слишком короткое',
            'name.max' => 'Имя слишком длинное',
            'num.required' => 'Введите количество столов',
            'num.numeric' => 'Количество столов должно быть целым числом',
            'num.min' => 'Количество столов должно быть положительным',
            'coordinates.required' => 'Введите координаты',
            'coordinates.regex' => 'Введите координаты в корректном формате',
            'coverage.required' => 'Выберите покрытие стола',
            'type.required' => 'Выберите тип площадки',
            'net.required' => 'Выберите тип сетки',
            'light.required' => 'Выберите тип освещения',
            'pay.required' => 'Укажите, платное ли пользование столами',
            'email.email' => 'Укажите ваш электронный адрес в правильном формате',
        ];
    }
}

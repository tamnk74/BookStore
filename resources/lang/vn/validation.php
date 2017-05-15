<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute must be accepted.',
    'active_url'           => ':attribute is not a valid URL.',
    'after'                => ':attribute phải là một ngày sau :date.',
    'after_or_equal'       => ':attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute may only contain letters.',
    'alpha_dash'           => ':attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => ':attribute may only contain letters and numbers.',
    'array'                => ':attribute phải là một mảng.',
    'before'               => ':attribute phải là một ngày trước :date.',
    'before_or_equal'      => ':attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Giá trị :attribute phải có giá trị từ :min đến :max.',
        'file'    => 'Giá trị :attribute phải có giá trị từ :min đến :max kilobytes.',
        'string'  => 'Giá trị :attribute phải có giá trị từ :min đến :max ký tự.',
        'array'   => 'Giá trị :attribute must have between :min and :max items.',
    ],
    'boolean'              => ':attribute field must be true or false.',
    'confirmed'            => ':attribute confirmation does not match.',
    'date'                 => ':attribute không phải là một ngày hợp lệ.',
    'date_format'          => ':attribute does not match the format :format.',
    'different'            => ':attribute and :other must be different.',
    'digits'               => ':attribute must be :digits digits.',
    'digits_between'       => ':attribute phải có giá trị từ :min đến :max.',
    'dimensions'           => ':attribute has invalid image dimensions.',
    'distinct'             => 'Trường :attribute bị trùng giá trị.',
    'email'                => ':attribute phải là một địa chỉ email hợp lệ.',
    'exists'               => ':attribute được chọn không hợp lệ.',
    'file'                 => ':attribute phải là một file.',
    'filled'               => 'Trường :attribute là bắt buộc.',
    'image'                => ':attribute phải là một ảnh.',
    'in'                   => ':attribute được chọn không hợp lệ.',
    'in_array'             => ':attribute field does not exist in :other.',
    'integer'              => ':attribute phải là số nguyên.',
    'ip'                   => ':attribute must be a valid IP address.',
    'json'                 => ':attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute không lớn hơn :max.',
        'file'    => ':attribute không lớn hơn :max kilobytes.',
        'string'  => ':attribute không lớn hơn :max kí tự.',
        'array'   => ':attribute không có nhiều hơn :max phần tử.',
    ],
    'mimes'                => ':attribute phải là file thuộc kiểu :values.',
    'mimetypes'            => ':attribute phải là file thuộc kiểu :values.',
    'min'                  => [
        'numeric' => ':attribute phải có tối thiểu :min.',
        'file'    => ':attribute phải có tối thiểu :min kilobytes.',
        'string'  => ':attribute phải có tối thiểu :min kí tự.',
        'array'   => ':attribute must have at least :min items.',
    ],
    'not_in'               => ':attribute được chọn không hợp lệ.',
    'numeric'              => ':attribute phải là một số.',
    'present'              => 'Trường :attribute phải tông tại.',
    'regex'                => ':attribute định dạng không hợp lệ.',
    'required'             => 'Trường :attribute là bắt buộc.',
    'required_if'          => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_unless'      => 'Trường :attribute là bắt buộc trừ khi :other nằm trong :values.',
    'required_with'        => 'Trường :attribute là bắt buộc khi :values tồn tại.',
    'required_with_all'    => 'Trường :attribute là bắt buộc khi :values tồn tại.',
    'required_without'     => 'Trường :attribute là bắt buộc khi :values không tồn tại.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có giá trị nào thuộc :values tồn tại.',
    'same'                 => ':attribute và :other must match.',
    'size'                 => [
        'numeric' => ':attribute phải có kích thước :size.',
        'file'    => ':attribute phải có :size kilobytes.',
        'string'  => ':attribute phải có :size kí tự.',
        'array'   => ':attribute phải chứa :size phần tử.',
    ],
    'string'               => ':attribute phải thuộc kiểu string.',
    'timezone'             => ':attribute must be a valid zone.',
    'unique'               => ':attribute has already been taken.',
    'uploaded'             => ':attribute upload file thất bại.',
    'url'                  => ':attribute định dạng không hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

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

    'accepted'             => 'Thuộc tính :attribute không được chấp nhận.',
    'active_url'           => 'Thuộc tính :attribute không phải là đường dẫn hợp lệ.',
    'after'                => 'Thuộc tính :attribute phải là một ngày sau :date.',
    'after_or_equal'       => 'Thuộc tính :attribute must be a date after or equal to :date.',
    'alpha'                => 'Thuộc tính :attribute may only contain letters.',
    'alpha_dash'           => 'Thuộc tính :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'Thuộc tính :attribute may only contain letters and numbers.',
    'array'                => 'Thuộc tính :attribute phải là một mảng.',
    'before'               => 'Thuộc tính :attribute phải là một ngày trước :date.',
    'before_or_equal'      => 'Thuộc tính :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Thuộc tính :attribute phải có giá trị từ :min đến :max.',
        'file'    => 'Thuộc tính :attribute phải có giá trị từ :min đến :max kilobytes.',
        'string'  => 'Thuộc tính :attribute phải có giá trị từ :min đến :max ký tự.',
        'array'   => 'Thuộc tính :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'Thuộc tính :attribute field must be true or false.',
    'confirmed'            => 'Thuộc tính :attribute confirmation does not match.',
    'date'                 => 'Thuộc tính :attribute không phải là một ngày hợp lệ.',
    'date_format'          => 'Thuộc tính :attribute does not match the format :format.',
    'different'            => 'Thuộc tính :attribute and :other must be different.',
    'digits'               => 'Thuộc tính :attribute must be :digits digits.',
    'digits_between'       => 'Thuộc tính :attribute phải có giá trị từ :min đến :max.',
    'dimensions'           => 'Thuộc tính :attribute has invalid image dimensions.',
    'distinct'             => 'Thuộc tính :attribute bị trùng giá trị.',
    'email'                => 'Thuộc tính :attribute phải là một địa chỉ email hợp lệ.',
    'exists'               => 'Thuộc tính :attribute được chọn không hợp lệ.',
    'file'                 => 'Thuộc tính :attribute phải là một file.',
    'filled'               => 'Thuộc tính :attribute là bắt buộc.',
    'image'                => 'Thuộc tính :attribute phải là một ảnh.',
    'in'                   => 'Thuộc tính :attribute được chọn không hợp lệ.',
    'in_array'             => 'Thuộc tính :attribute field does not exist in :other.',
    'integer'              => 'Thuộc tính :attribute phải là số nguyên.',
    'ip'                   => 'Thuộc tính :attribute must be a valid IP address.',
    'json'                 => 'Thuộc tính :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Thuộc tính :attribute không lớn hơn :max.',
        'file'    => 'Thuộc tính :attribute không lớn hơn :max kilobytes.',
        'string'  => 'Thuộc tính :attribute không lớn hơn :max kí tự.',
        'array'   => 'Thuộc tính :attribute không có nhiều hơn :max phần tử.',
    ],
    'mimes'                => 'Thuộc tính :attribute phải là file thuộc kiểu :values.',
    'mimetypes'            => 'Thuộc tính :attribute phải là file thuộc kiểu :values.',
    'min'                  => [
        'numeric' => ':attribute phải có tối thiểu :min.',
        'file'    => ':attribute phải có tối thiểu :min kilobytes.',
        'string'  => ':attribute phải có tối thiểu :min kí tự.',
        'array'   => ':attribute phải có tối thiểu :min phần tử.',
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
    'same'                 => 'Thuộc tính :attribute và :other phải khớp nhau.',
    'size'                 => [
        'numeric' => 'Thuộc tính  :attribute phải có kích thước :size.',
        'file'    => 'Thuộc tính  :attribute phải có :size kilobytes.',
        'string'  => 'Thuộc tính  :attribute phải có :size kí tự.',
        'array'   => 'Thuộc tính  :attribute phải chứa :size phần tử.',
    ],
    'string'               => 'Thuộc tính :attribute phải thuộc kiểu string.',
    'timezone'             => 'Thuộc tính :attribute must be a valid zone.',
    'unique'               => 'Thuộc tính :attribute has already been taken.',
    'uploaded'             => 'Thuộc tính :attribute upload file thất bại.',
    'url'                  => 'Thuộc tính  :attribute định dạng không hợp lệ.',

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

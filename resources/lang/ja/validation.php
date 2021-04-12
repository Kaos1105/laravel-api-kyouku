<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'を承認してください。',
    'active_url'           => 'には有効なURLを指定してください。',
    'after'                => 'には:date以降の日付を指定してください。',
    'after_or_equal'       => 'には:dateかそれ以降の日付を指定してください。',
    'alpha'                => 'には英字のみからなる文字列を指定してください。',
    'alpha_dash'           => 'には英数字・ハイフン・アンダースコアのみからなる文字列を指定してください。',
    'alpha_num'            => 'には英数字のみからなる文字列を指定してください。',
    'array'                => 'には配列を指定してください。',
    'before'               => 'には:date以前の日付を指定してください。',
    'before_or_equal'      => 'には:dateかそれ以前の日付を指定してください。',
    'between'              => [
        'numeric' => 'には:min〜:maxまでの数値を指定してください。',
        'file'    => 'には:min〜:max KBのファイルを指定してください。',
        'string'  => 'には:min〜:max文字の文字列を指定してください。',
        'array'   => 'には:min〜:max個の要素を持つ配列を指定してください。',
    ],
    'boolean'              => 'には真偽値を指定してください。',
    'confirmed'            => 'が確認用の値と一致しません。',
    'date'                 => 'には正しい形式の日付を指定してください。',
    'date_format'          => '":format"という形式の日付を指定してください。',
    'different'            => 'には:otherとは異なる値を指定してください。',
    'digits'               => 'には:digits桁の数値を指定してください。',
    'digits_between'       => 'には:min〜:max桁の数値を指定してください。',
    'dimensions'           => 'の画像サイズが不正です。',
    'distinct'             => '指定されたは既に存在しています。',
    'email'                => '※正しい形式のメールアドレスを指定してください。',
    'exists'               => '指定されたは存在しません。',
    'file'                 => 'にはファイルを指定してください。',
    'filled'               => 'は必須項目です。',
    'image'                => 'には画像ファイルを指定してください。',
    'in'                   => '※:attributeには:valuesのうちいずれかの値を指定してください。',
    'in_array'             => 'が:otherに含まれていません。',
    'integer'              => 'には整数を指定してください。',
    'ip'                   => 'には正しい形式のIPアドレスを指定してください。',
    'ipv4'                 => 'には正しい形式のIPv4アドレスを指定してください。',
    'ipv6'                 => 'には正しい形式のIPv6アドレスを指定してください。',
    'json'                 => 'には正しい形式のJSON文字列を指定してください。',
    'max'                  => [
        'numeric' => 'には:max以下の数値を指定してください。',
        'file'    => 'には:max KB以下のファイルを指定してください。',
        'string'  => 'には:max文字以下の文字列を指定してください。',
        'array'   => 'には:max個以下の要素を持つ配列を指定してください。',
    ],
    'mimes'                => 'には:valuesのうちいずれかの形式のファイルを指定してください。',
    'mimetypes'            => 'には:valuesのうちいずれかの形式のファイルを指定してください。',
    'min'                  => [
        'numeric' => 'には:min以上の数値を指定してください。',
        'file'    => 'には:min KB以上のファイルを指定してください。',
        'string'  => 'には:min文字以上の文字列を指定してください。',
        'array'   => 'には:min個以上の要素を持つ配列を指定してください。',
    ],
    'not_in'               => 'には:valuesのうちいずれとも異なる値を指定してください。',
    'numeric'              => 'には数値を指定してください。',
    'present'              => 'には現在時刻を指定してください。',
    'regex'                => '※:attributeは大文字の英数字で指定してください。',
    'required'             => '※:attributeを入力してください。',
    'required_if'          => 'を入力してください。',
    'required_unless'      => ':otherが:values以外の時は必須です。',
    'required_with'        => ':valuesのうちいずれかが指定された時は必須です。',
    'required_with_all'    => ':valuesのうちすべてが指定された時は必須です。',
    'required_without'     => ':valuesのうちいずれかがが指定されなかった時は必須です。',
    'required_without_all' => ':valuesのうちすべてが指定されなかった時は必須です。',
    'same'                 => '※:attributeがパスワードと一致しません。',
    'size'                 => [
        'numeric' => 'には:sizeを指定してください。',
        'file'    => 'には:size KBのファイルを指定してください。',
        'string'  => 'には:size文字の文字列を指定してください。',
        'array'   => 'には:size個の要素を持つ配列を指定してください。',
    ],
    'string'               => 'には文字列を指定してください。',
    'timezone'             => 'には正しい形式のタイムゾーンを指定してください。',
    'unique'               => '※:attributeはすでに使われています。',
    'uploaded'             => 'のアップロードに失敗しました。',
    'url'                  => 'には正しい形式のURLを指定してください。',
    'days_array'           => 'には「mmdd」形式の日付を指定してください。実際に存在しない日付は指定できません。',

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
        'period' => [
            'daterange_format' => 'には":format" ～ ":format"という形式の日付を指定してください。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        //Role
        'name'         => '名前',
        'display_name' => '表示名',
        'permissions'  => '権限',
        //Admin

        'username'               => 'ログインID',
        'password'               => 'パスワード',
        'confirm_password'       => '確認パスワード',
        'is_active'              => '有効',
        'role_id'                => 'ロールID',
        'security_code'          => '視聴パスワード',
        'video_type'             => '配信動画区分',
        'email'                  => 'メールアドレス',

        //User
        'nickname'               => 'ニックネーム',
        'gender'                 => '性別',

        // Content
        'content_title'          => 'コンテンツタイトル',
        'thumbnail'              => 'サムネイル画像',
        'publish_start_datetime' => '公開期間',
        'publish_end_datetime'   => '公開期間',
        'content_text'           => 'コンテンツ内容',
        'display_order'          => '表示順(昇順)',

        // News
        'news_category_id'       => 'お知らせカテゴリー',
        'news_url'               => 'リンク先URL',

        // Push
        'push_datetime'          => '予約配信日時',
        'push_category_id'       => 'Push配信カテゴリー',
        'column_push_interval'   => 'Push配信間隔',
        'push_message'           => 'Push通知メッセージ',
        'push_url'               => '通知URL',
        'push_age'               => '年齢層',
    ],
];

<?php

namespace App\Imports;

use Illuminate\Support\Facades\Validator;

class UsersImport
{
    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'mail_address',
            'watch_password',
            'video_type',
        ];
    }

    /**
     * @param array $array
     * @param $keyRow
     * @return array
     */
    function changeKeySpliceId(array $array, $keyRow): array
    {
        $keys = array_keys($array);
        $keys[array_search($keys, $keys)] = $this->headings();

        return array_combine($this->headings(), $array[$keyRow]);
    }

    /**
     * @return string[]
     */
    public function customValidationAttributes(): array
    {
        return [
            'mail_address'   => 'メールアドレス',
            'watch_password' => '視聴パスワード',
            'video_type'     => '配信動画区分',
        ];
    }

    /**
     * @return string[]
     */
    public function customValidationMessages(): array
    {
        return [
            'mail_address.unique'   => 'このメールアドレスは既に使用されています。',
            'watch_password.unique' => 'この視聴パスワードは既に使用されています。',
            'watch_password.regex'  => '正しい形式の視聴パスワードを指定してください。',
            'watch_password.min'    => '視聴パスワードは8文字で指定してください。',
            'watch_password.max'    => '視聴パスワードは8文字で指定してください。',
            'video_type.in'         => '配信動画区分に値を指定してください。',
            'video_type.required'   => '配信動画区分に値を指定してください。',
        ];
    }

    /**
     * @return string[]
     */
    public function customValidationRules(): array
    {
        return [
            'mail_address'   => 'required|email:rfc,dns|unique:users,email',
            'watch_password' => 'required|min:8|max:8|regex:/^(?=.*[0-9])(?=.*[A-Z])([A-Z0-9]+)$/|unique:users,security_code',
            'video_type'     => 'required|in:A,B',
        ];
    }

    /**
     * @param array $array
     * @param $keyRow
     * @return array[]
     */
    public function checkValidate(array $array, $keyRow): array
    {
        $errors = [];
        $data = [];
        $validator = Validator::make($array, $this->customValidationRules(), $this->customValidationMessages(), $this->customValidationAttributes());

        if ($validator->fails()) {
            array_push($errors, [
                'row'    => $keyRow,
                'email'  => $array['mail_address'],
                'errors' => [
                    'watch_password' => isset($validator->getMessageBag()->toArray()['watch_password']) ?
                        $validator->getMessageBag()->toArray()['watch_password'] : null,
                    'mail_address'   => isset($validator->getMessageBag()->toArray()['mail_address']) ?
                        $validator->getMessageBag()->toArray()['mail_address'] : null,
                    'video_type'     => isset($validator->getMessageBag()->toArray()['video_type']) ?
                        $validator->getMessageBag()->toArray()['video_type'] : null,
                ],
            ],
            );
        } else {
            array_push($data, array_merge(['row' => $keyRow], $array));
        }

        return [
            'data'  => $data,
            'error' => $errors,
        ];
    }

    /**
     * @param $file
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function importFile($file)
    {
        $errors = [];
        $dataAdd = [];
        if (($handle = fopen($file, 'r')) !== false) {
            $countRow = 1;
            $flag = true;

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if (count($data) !== count($this->headings())) {
                    return ['error_file', 1];
                }
                $charNumber = 0;
                array_walk_recursive($data, function ($val) use (&$charNumber) {
                    $charNumber += strlen($val);
                });

                if ($flag || $charNumber === 0) {
                    $flag = false;
                    $countRow++;
                    continue;
                }

                $countCol = count($data);

                for ($i = 0; $i < $countCol; $i++) {
                    $dataCsv[$countRow][$i] = $data[$i];
                }

                $arrChangeKey = $this->changeKeySpliceId($dataCsv, $countRow);

                $arrayData = $this->checkValidate($arrChangeKey, $countRow);
                $countRow++;
                if (count($arrayData['data']) != 0) {
                    array_push($dataAdd, $arrayData['data'][0]);
                } else {
                    array_push($errors, $arrayData['error'][0]);
                }
            }
        }
        fclose($handle);

        $result = [];

        $freshArrMail = array_intersect_key($dataAdd, $this->getFreshArray(array_column($dataAdd, 'mail_address')));

        $freshArrPass = array_intersect_key($dataAdd, $this->getFreshArray(array_column($dataAdd, 'watch_password')));

        $freshArr = array_intersect_key($freshArrMail, $freshArrPass);

        $duplicateErrors = $this->check_diff_multi($dataAdd, $freshArr);

        if (count($duplicateErrors)) {
            foreach ($duplicateErrors as $error) {
                $newLine = [];
                $newLine['row'] = $error['row'];
                $newLine['email'] = $error['mail_address'];
                $newLine['status'] = 'アップ不可';
                $newLine['reason'] = [['ユーザーデータが重複しています。']];
                $result[] = $newLine;
            }
        }

        if (count($errors)) {
            foreach ($errors as $error) {
                $newLine = [];
                $newLine['row'] = $error['row'];
                $newLine['email'] = $error['email'];
                $newLine['status'] = 'アップ不可';
                $newLine['reason'] = $error['errors'];
                $result[] = $newLine;
            }
        }

        foreach ($freshArr as $data) {
            $newLine = [];
            $newLine['row'] = $data['row'];
            $newLine['email'] = $data['mail_address'];
            $newLine['status'] = 'アップ可能';
            $newLine['watch_password'] = $data['watch_password'];
            $newLine['video_type'] = $data['video_type'];
            $newLine['reason'] = [];
            $result[] = $newLine;
        }
        $array = array_column($result, 'row');

        array_multisort($array, SORT_ASC, $result);

        return [$result, count($errors) || count($duplicateErrors)];
    }

    /**
     * @param $array
     * @return array
     */
    public function getFreshArray($array): array
    {
        return array_diff($array, array_diff_assoc($array, array_unique($array)));
    }

    /**
     * @param $array_parent
     * @param $array_child
     * @return mixed
     */
    function check_diff_multi($array_parent, $array_child)
    {
        foreach ($array_parent as $key => $value) {
            if (in_array($value, $array_child)) {
                unset($array_parent[$key]);
            }
        }

        return $array_parent;
    }
}

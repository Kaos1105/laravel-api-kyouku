<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Message extends Enum
{
    // Error Message
    const ERR0001 = ['code' => '0001', 'msg' => 'アクティベーションコードが間違っています。'];
    const ERR0002 = ['code' => '0002', 'msg' => '利用期間が終了しました。'];
    const ERR0003 = ['code' => '0003', 'msg' => 'グループ情報がありません。'];
    const ERR0004 = ['code' => '0004', 'msg' => '利用者情報がありません。'];
    const ERR0005 = ['code' => '0005', 'msg' => '入力したパスワードが間違っています。'];
    const ERR0006 = ['code' => '0006', 'msg' => '利用期間が終了しました。'];
    const ERR0007 = ['code' => '0007', 'msg' => 'カテゴリデータがありません。'];
    const ERR0008 = ['code' => '0008', 'msg' => 'テーマデータがありません。'];
    const ERR0009 = ['code' => '0009', 'msg' => '試験結果データがありません。'];
    const ERR0010 = ['code' => '0010', 'msg' => '用語データがありません。'];
    const ERR0011 = ['code' => '0011', 'msg' => '理解度テストの問題がありません。'];
    const ERR0012 = ['code' => '0012', 'msg' => '検定テストの合格点数がありません。'];
    const ERR0013 = ['code' => '0013', 'msg' => 'テスト結果の登録に失敗しました。'];
    const ERR0014 = ['code' => '0014', 'msg' => '試験結果データがありません。'];
    const ERR0015 = ['code' => '0015', 'msg' => '検定試験の問題がありません。'];
    const ERR0016 = ['code' => '0016', 'msg' => '検定試験の合格点数がありません。'];
    const ERR0017 = ['code' => '0017', 'msg' => '試験結果（理解度テスト）のデータがありません。'];
    const ERR0018 = ['code' => '0018', 'msg' => '試験結果（検定試験）のデータがありません。'];
    const ERR0019 = ['code' => '0019', 'msg' => '学習テキストデータがありません。'];
    const ERR0020 = ['code' => '0020', 'msg' => '試験結果の登録に失敗しました。'];
    const ERR0021 = ['code' => '0021', 'msg' => 'システム管理データがありません。'];
    const ERR0022 = ['code' => '0022', 'msg' => 'システム設定データがありません。'];
    const ERR0023 = ['code' => '0023', 'msg' => '端末管理の登録に失敗しました。'];
    const ERR0024 = ['code' => '0024', 'msg' => '利用者設定データがありません。'];
    const ERR0025 = ['code' => '0025', 'msg' => 'お知らせのデータがありません。'];
    const ERR0026 = ['code' => '0026', 'msg' => 'システムメッセージのデータがありません。'];
    // Information Message
    const INF0001 = ['code' => '0001', 'msg' => 'アクティベーションコードが成功します。'];
    const INF0002 = ['code' => '0002', 'msg' => ''];
    const INF0003 = ['code' => '0003', 'msg' => 'グループ情報があります。'];
    const INF0004 = ['code' => '0004', 'msg' => ''];
    const INF0005 = ['code' => '0005', 'msg' => ''];
    const INF0006 = ['code' => '0006', 'msg' => ''];
    const INF0007 = ['code' => '0007', 'msg' => 'カテゴリデータがあります。'];
    const INF0008 = ['code' => '0008', 'msg' => ''];
    const INF0009 = ['code' => '0009', 'msg' => ''];
    const INF0010 = ['code' => '0010', 'msg' => '用語データがあります。'];
    const INF0023 = ['code' => '0023', 'msg' => '端末管理の登録が成功しました。'];
    const INF0025 = ['code' => '0025', 'msg' => 'お知らせのデータがあります。'];
    const INF0026 = ['code' => '0026', 'msg' => 'システムメッセージのデータがあります。'];
    // System Message
    const SYS9999 = ['code' => '9999', 'msg' => ''];
}

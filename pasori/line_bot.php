<?php
//お借りしました。　参照元：https://imoni.net/tips/00xx/0012.html

function line($mes){
    // HTTPヘッダを設定
    $channelToken = 'チャンネルトークン';
    $headers = [
        'Authorization: Bearer ' . $channelToken,
        'Content-Type: application/json; charset=utf-8',
    ];

    // POSTデータを設定してJSONにエンコード
    $post = [
        'to' => '宛先',
        'messages' => [
            [
                'type' => 'text',
                'text' => $mes,
            ],
        ],
    ];
    $post = json_encode($post);

    // HTTPリクエストを設定
    $ch = curl_init('https://api.line.me/v2/bot/message/push');
    $options = [
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_BINARYTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => $post,
    ];
    curl_setopt_array($ch, $options);

    // 実行
    $result = curl_exec($ch);

    // エラーチェック
    $errno = curl_errno($ch);
    if ($errno) {
        return;
    }

    // HTTPステータスを取得
    $info = curl_getinfo($ch);
    $httpStatus = $info['http_code'];

    $responseHeaderSize = $info['header_size'];
    $body = substr($result, $responseHeaderSize);


}
?>

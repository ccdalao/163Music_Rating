<?php
// 使用网易云音乐等级专用API
$api_url = 'https://music.163.com/api/user/level';
$cookie = '你的cookie，务必携带__csrf';

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIE         => $cookie,
    CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER     => [
        'Referer: https://music.163.com/user/level'
    ]
]);

$response = curl_exec($ch);
curl_close($ch);

// 解析JSON数据
$data = json_decode($response, true);

if (isset($data['data'])) {
    $level = $data['data']['level'];
    $nextLevel = $level + 1;
    $nowPlayCount = $data['data']['nowPlayCount'];
    $nextPlayCount = $data['data']['nextPlayCount'];
    $nowLoginCount = $data['data']['nowLoginCount'];
    $nextLoginCount = $data['data']['nextLoginCount'];
    
    $output = [
        '当前等级' => "Lv{$level}",
        '距离下一个等级' => "Lv{$nextLevel}",
        '还需听歌(首)' => $nextPlayCount - $nowPlayCount,
        '还需登录(天)' => $nextLoginCount - $nowLoginCount
    ];
    
    echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['error' => '获取数据失败，请检查Cookie有效性'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
?>
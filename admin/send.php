<?php
require('Pusher.php');
$options = array(
    'encrypted' => true
);
$pusher = new Pusher(
        '687e833fc59d2e444e1a', '4bff4c2e434abb0db9d2', '1727165', $options
);
$data['name'] = 'Freetuts.net';
$data['message'] = 'Đây là tin nhắn test realtime với pusher';
$pusher->trigger('Freetuts', 'notice', $data);
//Freetuts la ten kenh ban dat la gi thuy
//notice la su kien ban dat gi cung duoc ban co the tao ra nhieu kenh
//data la du lieu gui di
?>
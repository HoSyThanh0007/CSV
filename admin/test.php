<!-- <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Real-Time PHP</title>
        <script src="notice.js"></script>
        <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            Pusher.logToConsole = true;
            var pusher = new Pusher('687e833fc59d2e444e1a', {
                encrypted: true
            });
            var channel = pusher.subscribe('Freetuts');
            channel.bind('notice', function (data) {
                n = new Notification(
                        'Bạn nhận được thông báo mới',
                        {
                            body: data.name + 'đã gửi tin nhắn cho bạn:' + data.message,
                            icon: 'https://freetuts.net/public/logo/icon.png',
                            tag: 'https://freetuts.net/'
                        }
                );
                setTimeout(n.close.bind(n), 10000);
                n.onclick = function () {
                    window.location.href = this.tag;
                }
            });
        </script>
        <p style="color:#ff0000;line-height:20px">
            Bạn đang tìm hiểu demo realtime trong php bằng cách sử dụng pusher, bạn cần đồng ý cho phép thông báo trên trang web này để có thể test demo trong bài này. Bạn đừng đi đâu cả hay mở tab mới chạy file send.php để xem kết quả nhé
        </p>
    </body>
</html>
<!-- app_id = "1727165"
key = "687e833fc59d2e444e1a"
secret = "4bff4c2e434abb0db9d2"
cluster = "ap1" --> -->
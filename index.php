<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = "7400651101:AAGQPh81PuyQv4EeleYEpDGPtSDSiRn4TiI"; // Твой токен бота
    $chat_id = "6462934307"; // ID чата или пользователя

    $product = htmlspecialchars($_POST["product"]); // Получаем товар из формы
    $message = "Привет, мне нужен такой товар: $product";

    // Формируем запрос к Telegram API
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        "chat_id" => $chat_id,
        "text" => $message,
        "parse_mode" => "HTML"
    ];

    // Отправляем запрос
    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result) {
        echo "Сообщение отправлено!";
    } else {
        echo "Ошибка при отправке.";
    }
}
?>

<?php
// Get the submitted name from the form
$name = $_POST['name'];
// Get the IP address of the user
$ip = $_SERVER['REMOTE_ADDR'];

// Telegram bot API URL and bot token
$bot_url = 'https://api.telegram.org/bot6941631904:AAHfNlGSRsCLs23y6QMtFoq_p9o8p1gEW9w';
// Telegram channel ID
$channel_id = '-1001923193748';
// Message to be sent to the channel
$message = "Attendance: >> $name << has checked in from IP address: $ip.";

// Send the message to the Telegram channel using the bot API
$telegram_url = $bot_url . '/sendMessage?chat_id=' . $channel_id . '&text=' . urlencode($message);
$ch = curl_init($telegram_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

// Check if the message was sent successfully
if ($result) {
    echo "<h1>Attendance submitted successfully.</h1>";
} else {
    echo "Failed to submit attendance.";
}
?>

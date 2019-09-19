<?php include "../inc/dbinfo.inc"; ?>
<?php
/**
 * Telegram Bot access token e URL.
 */
$access_token = '796910044:AAFv9Ogprp6YmqXHNrEfsKsM8qREcgEWIX0';
$api          = 'https://api.telegram.org/bot' . $access_token;

$output     = json_decode(file_get_contents('php://input'), TRUE);
$chat_id    = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
$message    = $output['message']['text'];

$emoji = array(
    'thumbsup' => json_decode('"\uD83D\uDC4D"'),
    'smilingface' => json_decode('"\uD83D\uDE03"'),
    'whiteheavycheckmark' => json_decode('"\u2705"'),
    'envelope' => json_decode('"\u2709"'),
    'smiling' => json_decode('"\uD83D\uDE0A"'),
    'star' => json_decode('"\u2B50"'),
    'telephone' => json_decode('"\uD83D\uDCDE"'),
    'officebuilding' => json_decode('"\uD83C\uDFE2"'),
    'atm' => json_decode('"\uD83C\uDFE7"'),
    'exchange' => json_decode('"\uD83D\uDCB1"'),
    'charttrend' => json_decode('"\uD83D\uDCC8"'),
    'paperclip' => json_decode('"\uD83D\uDCCE"'),
    'clock' => json_decode('"\uD83D\uDD52"'),
    'calendar' => json_decode('"\uD83D\uDCC5"'),
    'banknoteusd' => json_decode('"\uD83D\uDCB5"'),
    'banknoteeuro' => json_decode('"\uD83D\uDCB6"'),
    'ok' => json_decode('"\uD83D\uDC4C"'),
    'idea' => json_decode('"\uD83D\uDCA1"'),
    'video' => json_decode('"\uD83D\uDCF9"')
);

$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET CHARSET utf8");

/**
 * The logic of the bot replies
 */
switch (true) {
    
    case $message == '/start':
        $w_text = 'I test bot Savings Bank of Kazakhstan. I work around the clock and is always ready to help you.' . $emoji['thumbsup'];
        $w_text .= chr(10) . chr(10) . $emoji['smilingface'] . ' Tell A Friend' . chr(10) . ' My username @sberbankkztestbot';
        $w_text .= chr(10) . chr(10) . $emoji['whiteheavycheckmark'] . ' Official site' . chr(10) . ' www.sberbank.kz';
        $w_text .= chr(10) . chr(10) . $emoji['envelope'] . ' Proposals and comments on Bot' . chr(10);
        $type   = 'start';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = '/start';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == $emoji['smilingface']:
        $w_text = $emoji['smilingface'] . ' Facts of the Savings Bank, financial tips and tutorial videos.';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'Facts and tips';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, 'facts', $emoji);
        break;
    case $message == $emoji['idea'] . ' Tip':
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $sql1    = "SELECT * FROM texts WHERE type=0";
        $result1 = $conn->query($sql1);
        while ($row = $result1->fetch_assoc()) {
            $myRows[] = $row;
        }
        $randomEntry = $myRows[array_rand($myRows)];
        $mes         = 'Council';
        $sql         = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result      = $conn->query($sql);
        sendMessage($chat_id, $emoji['idea'] . $randomEntry['header'] . chr(10) . '' . $randomEntry['text'], 'facts', $emoji);
        break;
    case $message == $emoji['ok'] . ' Fact':
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $sql1    = "SELECT * FROM texts WHERE type=1";
        $result1 = $conn->query($sql1);
        while ($row = $result1->fetch_assoc()) {
            $myRows[] = $row;
        }
        $randomEntry = $myRows[array_rand($myRows)];
        $mes         = 'Fact';
        $sql         = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result      = $conn->query($sql);
        sendMessage($chat_id, $emoji['idea'] . $randomEntry['header'] . chr(10) . '' . $randomEntry['text'], 'facts', $emoji);
        break;
    case $message == 'Мне нравится ' . $emoji['thumbsup']:
        $w_text = 'If I loved you, Please contact us, vote for me ' . $emoji['smiling'];
        $w_text .= chr(10) . chr(10) . ' Go to StoreBot https://telegram.me/storedbot?start=sberbankkztestbot';
        $w_text .= chr(10) . chr(10) . ' Press Start';
        $w_text .= chr(10) . chr(10) . ' Select rating';
        $w_text .= chr(10) . chr(10) . ' Thank you!';
        $type   = 'nextmenu';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'I like';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == $emoji['telephone']:
        $w_text = 'I test bot Savings Bank of Kazakhstan. I work around the clock and is always ready to help you.' . $emoji['thumbsup'];
        $w_text .= chr(10) . chr(10) . $emoji['smilingface'] . 'Tell A Friend' . chr(10) . ' My username @sberbankkztestbot';
        $w_text .= chr(10) . chr(10) . $emoji['whiteheavycheckmark'] . ' Official site ' . chr(10) . ' www.sberbank.kz';
        $w_text .= chr(10) . chr(10) . $emoji['envelope'] . ' Proposals and comments on Bot' . chr(10);
        $type   = 'start';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'Contact';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == $emoji['exchange'] . " Currency":
        
        $url     = "http://www.nationalbank.kz/rss/rates_all.xml";
        $feed    = file_get_contents($url);
        $items   = simplexml_load_string($feed);
        $strval  = $emoji['calendar'] . ' Data relevant to ' . date("d-m-Y H:i:s") . ' for the Almaty region.' . chr(10) . chr(10);
        $dataObj = simplexml_load_file($url);
        if ($dataObj) {
            foreach ($dataObj->channel->item as $item) {
                if ($item->title == 'USD') {
                    $strval .= $emoji['banknoteusd'] . ' ' . $item->title . ' (U.S. dollar)' . chr(10) . $item->description . ' KZT' . chr(10) . chr(10);
                }
                if ($item->title == 'EUR') {
                    $strval .= $emoji['banknoteeuro'] . ' ' . $item->title . ' (Euro)' . chr(10) . $item->description . ' KZT' . chr(10) . chr(10);
                }
            }
        }
        $strval .= $emoji['whiteheavycheckmark'] . ' More accurate data on the official site or application Sberbank Online.';
        sendMessage($chat_id, $strval, 'nextmenu', $emoji);
        $mes    = 'Currency';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        break;
    case $message == 'Menu':
        $w_text = 'How can I help you?';
        $w_text .= chr(10) . ' Send me "?" for reference.';
        $type   = 'nextmenu';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'menu';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == $emoji['atm'] . ' ATM':
        $w_text = 'Я найду ' . $emoji['officebuilding'] . ' ATMs near you.';
        $w_text .= chr(10) . ' Please send your location:';
        $w_text .= chr(10) . ' Press ' . $emoji['paperclip'];
        $w_text .= chr(10) . ' Select "Location"';
        $w_text .= chr(10) . ' Clic "Send my current location"';
        $type   = 'nextmenu';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'ATM';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == $emoji['officebuilding'] . ' Branch':
        $w_text = 'I find ' . $emoji['officebuilding'] . ' Branch next to you.';
        $w_text .= chr(10) . ' Please send your location:';
        $w_text .= chr(10) . ' Press ' . $emoji['paperclip'];
        $w_text .= chr(10) . ' Select "Location"';
        $w_text .= chr(10) . ' Click "Send my current location"';
        $type   = 'nextmenu';
        $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                $result = $conn->query($sql);
            }
        }
        $mes    = 'Branch';
        $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
        $result = $conn->query($sql);
        sendMessage($chat_id, $w_text, $type, $emoji);
        break;
    case $message == '' and $output['message']['location']['latitude'] != '';
        $sql    = "SELECT message_text FROM message_queue ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);
        $row    = $result->fetch_assoc();
        if ($row['message_text'] == 'Branch') {
            $w_text = $emoji['thumbsup'] . ' Thank you. Branches and offices of a number:';
            $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                    $result = $conn->query($sql);
                }
            }
            $mes    = $output['message']['location']['latitude'] . ',' . $output['message']['location']['longitude'];
            $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
            $result = $conn->query($sql);
            sendMessage($chat_id, $w_text, 'nextmenu', $emoji);
            
            
            $sql    = "SELECT id,name,address,phone,lat,lng, ( 6371  * acos( cos( radians(" . $output['message']['location']['latitude'] . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $output['message']['location']['longitude'] . ") ) + sin( radians(" . $output['message']['location']['latitude'] . ") ) * sin(radians(lat)) ) ) AS distance FROM markers HAVING distance < 2 ORDER BY distance LIMIT 0 , 20";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $str = '';
                    $str .= $emoji['officebuilding'] . " " . $row['name'] . ":" . chr(10) . $row['address'] . chr(10) . " Телефоны: " . $row['phone'] . chr(10);
                    $res     = '';
                    $sql1    = "SELECT * FROM markers_schedule WHERE marker_id=" . $row['id'];
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                            $res .= $emoji['clock'] . " " . $row1['day'] . ".: c " . $row1['fromthe'] . " - " . $row1['along'] . chr(10);
                        }
                    }
                    $metr = round($row['distance'] * 1.6 * 1000, 2);
                    $str .= $res . chr(10) . $metr . " Meter (s)";
                    $lat = $row['lat'];
                    $lng = $row['lng'];
                    sendMessage($chat_id, $str, 'nextmenu', $emoji);
                    sendLocation($chat_id, $lat, $lng, $emoji);
                }
                
            }
            
        } else {
            $w_text = $emoji['thumbsup'] . ' Thank you. ATMs near:';
            $sql    = "SELECT min(id) mid FROM message_queue WHERE chat_id=" . $chat_id . " HAVING count(id)>=2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sql    = "DELETE FROM message_queue WHERE id=" . $row["mid"];
                    $result = $conn->query($sql);
                }
            }
            $mes    = $output['message']['location']['latitude'] . ',' . $output['message']['location']['longitude'];
            $sql    = "INSERT INTO message_queue VALUES(NULL," . $chat_id . ",'" . $mes . "')";
            $result = $conn->query($sql);
            sendMessage($chat_id, $w_text, 'nextmenu', $emoji);
            
            
            $sql    = "SELECT id,name,address,descr,lat,lng, ( 6371  * acos( cos( radians(" . $output['message']['location']['latitude'] . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(" . $output['message']['location']['longitude'] . ") ) + sin( radians(" . $output['message']['location']['latitude'] . ") ) * sin(radians(lat)) ) ) AS distance FROM atm HAVING distance < 2 ORDER BY distance LIMIT 0 , 20";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $str = '';
                    $str .= $emoji['atm'] . " " . $row['name'] . ":" . chr(10) . $row['address'] . chr(10) . " " . $row['descr'] . chr(10);
                    $metr = round($row['distance'] * 1.6 * 1000, 2);
                    $str .= chr(10) . $metr . " Meter (s)";
                    $lat = $row['lat'];
                    $lng = $row['lng'];
                    sendMessage($chat_id, $str, 'nextmenu', $emoji);
                    sendLocation($chat_id, $lat, $lng, $emoji);
                }
                
            }
        }
        break;
    default:
        break;
        
}

/**
 * Send message function
 */
function sendMessage($chat_id, $message, $type, $emoji)
{
    /**
     * Menu
     */
    if ($type == 'start') {
        $replyMarkup = array(
            'keyboard' => array(
                array(
                    "Menu",
                    "I like " . $emoji['thumbsup']
                )
            ),
            'resize_keyboard' => true,
            'one_time_keyboard' => false
        );
    } else if ($type == 'nextmenu') {
        $replyMarkup = array(
            'keyboard' => array(
                array(
                    $emoji['officebuilding'] . " Branches",
                    $emoji['atm'] . " ATMs"
                ),
                array(
                    $emoji['exchange'] . " Currency",
                    $emoji['charttrend'] . " Quotes"
                ),
                array(
                    $emoji['smilingface'],
                    $emoji['star'],
                    $emoji['telephone']
                )
            ),
            'resize_keyboard' => true,
            'one_time_keyboard' => false
        );
    } else if ($type == 'facts') {
        $replyMarkup = array(
            'keyboard' => array(
                array(
                    $emoji['idea'] . " Board",
                    $emoji['ok'] . " Fact"
                ),
                array(
                    "Меню",
                    $emoji['video'] . " Video"
                )
            ),
            'resize_keyboard' => true,
            'one_time_keyboard' => false
        );
    }
    /**
     * Send message
     */
    $encodedMarkup = json_encode($replyMarkup);
    file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $encodedMarkup);
    
    
}
/**
 * Send message with location function
 */
function sendLocation($chat_id, $latitude, $longitude, $emoji)
{
    /**
     * Menu
     */
    $replyMarkup   = array(
        'keyboard' => array(
            array(
                $emoji['officebuilding'] . " Branches",
                $emoji['atm'] . " ATMs"
            ),
            array(
                $emoji['exchange'] . " Currency",
                $emoji['charttrend'] . " Quotes"
            ),
            array(
                $emoji['smilingface'],
                $emoji['star'],
                $emoji['telephone']
            )
        ),
        'resize_keyboard' => true,
        'one_time_keyboard' => false
    );
    /**
     * Send message
     */
    $encodedMarkup = json_encode($replyMarkup);
    file_get_contents($GLOBALS['api'] . '/sendLocation?chat_id=' . $chat_id . '&latitude=' . $latitude . '&longitude=' . $longitude . '&reply_markup=' . $encodedMarkup);
    
}
?>
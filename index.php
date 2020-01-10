<?php

require_once 'vendor/autoload.php';

$token = "1047610052:AAHJCWFXJ7FxeTrcv01pVxAg4uRH_1c2iFA";
$bot = new \TelegramBot\Api\Client($token);

// команда для start
$bot->command('start', function ($message) use ($bot) {


    $answer = 'Добро пожаловать! Воспользуйтесь меню для продолжения';
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("Посмотреть товары", "Сделать заказ")), true);
    $keyboard ->setResizeKeyboard(true);
    $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
});

// команда для помощи
$bot->command('help', function ($message) use ($bot) {
    $answer = '
    Добро пожаловать в @rhino_sales ! Этот бот поможет Вам выбрать и заказать различную электронику и технику. Для просмотра товаров, выберите категорию используя всплывающее меню.
    
Команды:
/start - Начать работу с ботом
/help - Вывод справки';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});


    $bot->on(function ($Update) use ($bot) {$message = $Update->getMessage();

        $message = $Update->getMessage();
        $msg_text = $message->getText();

    if ($msg_text == 'Сделать заказ'){

        $answer = 'Для заказа обратитесь @anvarbey или @aliceberg';
        $bot->sendMessage($message->getChat()->getId(), $answer);

    }

    elseif ($msg_text == 'В начало') {
        $answer = 'Добро пожаловать! Воспользуйтесь списком команд для продолжения';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("Посмотреть товары", "Сделать заказ")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    elseif ($msg_text == 'Посмотреть товары') {
        $answer = 'Отлично! Какую категорию товаров Вы бы хотели посмотреть?';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Для компьютеров", "Для телефонов")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    elseif ($msg_text == 'Для компьютеров') {
        $answer = 'Товары для компьютеров:';;
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Ус-ва хранения", "В начало"),array("", "Ус-ва ввода", "Гарнитура")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    elseif ($msg_text == 'Для телефонов') {
        $answer = 'Товары для телефонов:';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Память", "Аксессуары", "Колонки","В начало")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    
    
    // Desktop  
    
    
    elseif ($msg_text == 'Ус-ва хранения') {
        $answer = 'Устройства хранения:';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Внешние ЖД", "В начало"),array("", "Flash-USB накопители", "SSD")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
     elseif ($msg_text == 'Ус-ва ввода') {
        $answer = 'Устройства ввода (Мышь/Клавиатура):';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Мыши", "В начало"),array("", "Клавиатуры", "Комплекты")), true);
        // 
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
     elseif ($msg_text == 'Устройства хранения') {
        $answer = 'Устройства хранения:';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Мыши", "Клавиатуры", "Комплекты","В начало")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    
    elseif ($msg_text == 'SSD') {
        for ($i = 1; $i <= 7; $i++) {
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('SSDFixed/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'SSD'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'SSD');
    }
    elseif ($msg_text == 'Flash-USB накопители') {
        for ($i = 1; $i <= 43 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('FlashUSB/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'FlashUSB'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Флеш Накопители');
    }
    elseif ($msg_text == 'Внешние ЖД') {
        for ($i = 1; $i <= 6 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Hard/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Hard'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Внешние жесткие диски');
    }
    elseif ($msg_text == 'Клавиатуры') {
        for ($i = 1; $i <= 14 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Keyboard/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Keyboard'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Клавиатуры');
    }
    elseif ($msg_text == 'Мыши') {
        for ($i = 1; $i <= 22 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Mouse/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Mouse'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Мыши');
    }
     elseif ($msg_text == 'Комплекты') {
        for ($i = 1; $i <= 9 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Set/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Set'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Наборы');
     }
     elseif ($msg_text == 'Гарнитура') {
        for ($i = 1; $i <= 5 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Headphones/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Set'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Гарнитура');
     }
    
    // Phones
    
    elseif ($msg_text == 'Аксессуары') {
        $answer = 'Устройства хранения:';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "Пауер Банки", "В начало"),array("", "Зарядные ус-ва", "Кабели","Чехлы")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    elseif ($msg_text == 'Память') {
        $answer = 'Устройства хранения:';
        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("", "MicroSD", "SD", "В начало")), true);
        $keyboard ->setResizeKeyboard(true);
        $bot->sendMessage($message->getChat()->getId(), $answer, null, false, null, $keyboard);
    }
    
     elseif ($msg_text == 'Пауер Банки') {
        for ($i = 1; $i <= 5 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Powerbank/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Powerbank'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Пауербанки');
     }
     
     elseif ($msg_text == 'Зарядные ус-ва') {
        for ($i = 1; $i <= 3 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Charger/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Charger'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Зарядные устройства');
     }
       elseif ($msg_text == 'Кабели') {
        for ($i = 1; $i <= 5 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Cable/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Cable'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Кабели');
     }
     
     elseif ($msg_text == 'Колонки') {
        for ($i = 1; $i <= 5 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Speaker/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Speaker'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Колонки');
     }
     elseif ($msg_text == 'Чехлы') {
        for ($i = 1; $i <= 9 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('Cases/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'Speaker'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'Чехлы');
     }
     
     elseif ($msg_text == 'MicroSD') {
        for ($i = 1; $i <= 4 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('MicroSD/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'MicroSD'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'MicroSD');
     }
     
        elseif ($msg_text == 'SD') {
        for ($i = 1; $i <= 1 ; $i++){
            $bot->sendPhoto($message->getChat()->getId(), new CURLFile('SD/' . '(' . $i . ')' . '.jpg', 'image/jpg', 'SD'));
        }
        $bot->sendMessage($message->getChat()->getId(), 'SD');
     }
    
    
}, function () { return true; });

$bot->run();

<?php

define('API_KEY','325224183:AAFfUC72WaotT77aR-7sqoyL5kb9wGOfF0A');

function jockdoni($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$txt = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from = $update->message->from->id;
$channelusername = '@ios_ir';
$channelnoa = 'ios_ir';
$adminnoa = 'nader_ir_niakan';
$admin = "225987393";

$jock = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس ','url'=>'http://appleice.ir']]
]]);

$dialog = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس ','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>' سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

$yalda = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

$sms = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

$video = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

$photo = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

$sticker = json_encode(['inline_keyboard'=>[
    [['text'=>'اولین پیام کانال','url'=>'https://telegram.me/'.$channelnoa.'/5']],
    [['text'=>'کانال اپل ایس','url'=>'https://telegram.me/'.$channelnoa]],
    [['text'=>'تبلیغات شما در اینجا','url'=>'https://telegram.me/'.$adminnoa],
        ['text'=>'سایت اپل ایس','url'=>'http://appleice.ir']]
]]);

if($from == $admin) {
 
  if(isset($update->message->video)){
    jockdoni('sendVideo', [
        'chat_id' => $channelusername,
        'video' =>$update->message->video->file_id,
        'caption'=>$update->message->video->caption . "
         $channelusername",
            'reply_markup'=>$video
    ]);
  }
//     elseif(isset($update->message->photo)){
    
//     $photo = $update->message->photo;
//     jockdoni('sendPhoto', [
//         'chat_id' => $channelusername,
//         'photo' =>$photo->[file_id],
//         'caption'=>$update->message->caption."
//         🌈 $channelusername",
//             'reply_markup'=>$photo
//     ]);
//   }
  elseif(isset($update->message->sticker)){
    jockdoni('sendSticker', [
        'chat_id' => $channelusername,
        'sticker' =>$update->message->sticker->file_id,
        'reply_markup'=>$sticker
    ]);
  }elseif (isset($update->message->forward_from)){
    jockdoni('sendMessage', [
        'chat_id' => $chat_id,
        'text' =>"آیدی عددی9⃣ :
        ".$update->message->forward_from->id."
        نام چت 📜:".
      $update->message->forward_from->first_name,
        'parse_mode' => 'HTML',
            'reply_markup'=>json_encode([
                'keyboard'=>[array("آمار کانال","اطلاعات کانال"),array("مقام من")],
                'resize_keyboard'=>true
            ])
    ]);
  }elseif (isset($update->message->forward_from_chat)){
    jockdoni('sendMessage', [
        'chat_id' => $chat_id,
        'text' =>"آیدی عددی9⃣ :
        ".$update->message->forward_from_chat->id."
        نام چت 📜:
        ".$update->message->forward_from_chat->first_name,
        'parse_mode' => 'HTML',
            'reply_markup'=>json_encode([
                'keyboard'=>[array("آمار کانال","اطلاعات کانال"),array("مقام من")],
                'resize_keyboard'=>true
            ])
    ]);
  }elseif(preg_match('/^\/([Ss]tart)/',$txt)){
    jockdoni('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "سلام قربان �🏻
برای ارسال پیام به کانال از دستورات زیر استفاده کنید ⚙:
" . "<code>" . "/jock [TEXT]

/dialog [TEXT]

/yalda [TEXT]

/sms [TEXT]" . "</code>",
        'parse_mode' => 'HTML',
            'reply_markup'=>json_encode([
                'keyboard'=>[array("آمار کانال","اطلاعات کانال"),array("مقام من")],
                'resize_keyboard'=>true
            ])
    ]);

}elseif($txt == "/time"){
    
$time = file_get_contents("http://api.bridge-ads.ir/td/?td=time");
$date = file_get_contents("http://api.bridge-ads.ir/td/?td=date");

if(isset($update->callback_query)){
    $callbackMessage = 'آپدیت شد';
    var_dump(jockdoni('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_ids = $update->callback_query->message->chat->id;
    $message_ids = $update->callback_query->message->message_id;
    $tried = $update->callback_query->data+1;
    var_dump(
        jockdoni('editMessageText',[
            'chat_id'=>$chat_ids,
            'message_id'=>$message_ids,
            'text'=>"     زمان : \n".$time."
            تاریخ:
            ".$date
      ,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"رفرش زمان",'callback_data'=>"$tried"]
                    ]
                ]
            ])
        ])
    );

}else{
    var_dump(jockdoni('sendMessage',[
        'chat_id'=>$chat_id,
                  'text'=>"     زمان : \n".$time."
            تاریخ:
            ".$date,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [
                    ['text'=>"رفرش زمان",'callback_data'=>'1']
                ]
            ]
        ])
    ]));
}

    
  }elseif($txt == "مقام من"){
// https://api.telegram.org/bot208887950:AAFRHMU4TPBRPztspJj-DfRp9QKx-hpAiu4/getChatMember?chat_id=@ch_jockdoni&user_id=322242763
        $maqams = json_decode(
            file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channelusername&user_id=".$chat_id)
        );
        if ($maqams->ok == true)
        {
            jockdoni('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"مقام شما : ".$maqams->result->status,
                'reply_markup'=>$buttonsadehmanage
            ]);
        }

    }elseif ($txt == '/state' || $txt == "آمار کانال"){
        $amar = json_decode(
            file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMembersCount?chat_id=$channelusername")
        );
        if ($amar->ok == true)
        {
            jockdoni('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"آمار فعلی کانال شما :".$amar->result,
                'reply_markup'=>$buttonsadehmanage
            ]);
        }
    }elseif($txt == "/info" || $txt == "اطلاعات کانال"){
        $info = json_decode(
            file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=$channelusername")
        );
        if ($info->ok == true)
        {
            jockdoni('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"نام کانال شما :
            ".$info->result->title."
            آیدی حروفی :
            ".$info->result->username."
            آیدی عددی کانال :
            ".$info->result->id,
                'reply_markup'=>$buttonsadehmanage
            ]);
        }
    }elseif(preg_match('/^\/([Dd]ialog)/',$txt)){
        
    $dialogs = str_replace("/dialog","",$txt);
    
    jockdoni('sendMessage',[
        'chat_id'=>$channelusername,
        'text'=>'#اپل
      '.$dialogs.'
      📜 <a href="http://telegram.me/'.$channelnoa.'"'.">کانال اپل ایس </a>

╭─═ঊঈঊঈ═─╮
 $channelusername 
╰─═ঊঈঊঈ═─╯",
        'parse_mode'=>'HTML',
        'reply_markup'=>$dialog
    ]);
  }elseif(preg_match('/^\/([Jj]ock)/',$txt)){
    $jocks = str_replace("/jock","",$txt);
    
    jockdoni('sendMessage',[
        'chat_id'=>$channelusername,
        'text'=>'#اپل
      '.$jocks.'
      📜 <a href="http://telegram.me/'.$channelnoa.'"'.">کانال اپل ایس </a>

╭─═ঊঈঊঈ═─╮
 $channelusername 
╰─═ঊঈঊঈ═─╯",
        'parse_mode'=>'HTML',
        'reply_markup'=>$jock
    ]);
  }elseif(preg_match('/^\/([Yy]alda)/',$txt)){
    $yaldas = str_replace("/yalda", "", $txt);

    jockdoni('sendMessage', [
        'chat_id' => $channelusername,
        'text' => '#اپل
      ' . $yaldas . '
      📜 <a href="http://telegram.me/' . $channelnoa . '"' . ">کانال اپل ایس </a>

╭─═ঊঈঊঈ═─╮
 $channelusername 
╰─═ঊঈঊঈ═─╯",
        'parse_mode' => 'HTML',
        'reply_markup' => $yalda
    ]);

}elseif(preg_match('/^\/([Ss]ms)/',$txt)){
    $smss = str_replace("/sms", "", $txt);

    jockdoni('sendMessage', [
        'chat_id' => $channelusername,
        'text' => '#اپل
      ' . $smss . '
      📜 <a href="http://telegram.me/' . $channelnoa . '"' . ">کانال اپل ایس </a>

╭─═ঊঈঊঈ═─╮
 $channelusername 
╰─═ঊঈঊঈ═─╯",
        'parse_mode' => 'HTML',
        'reply_markup' => $sms
    ]);

}elseif (isset($update->message->reply_to_message)){
  $rpmid = $update->message->reply_to_message->forward_from->id;
      jockdoni('sendMessage', [
            'chat_id' => $rpmid,
            'text' => $txt,
            'parse_mode'=>'Markdown'
        ]);
    }
}elseif($from != $admin) {
    if ($txt == "/start") {
        jockdoni('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "سلام 😍
      خوش آمدید برای ورود به کانال به آیدی $channelusername مراجعه کنید.
      
      برای ارسال پیام به ادمین پیام خود را ارسال کنید",
            'parse_mode' => 'HTML'
        ]);
    }else{
        jockdoni('forwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ]);
        jockdoni('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "پیام ارسال شد✅"
        ]);
    } 
}

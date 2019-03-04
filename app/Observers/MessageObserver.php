<?php
namespace App\Observers;
use App\User;
use App\Message;
use App\Conversation;
use App\Events\Messagesent;

class MessageObserver {

    public function created(Message $message){

        $conversation = Conversation::where('user_id', $message->from_id)
        ->where('contact_id', $message->to_id)->first();

        if($conversation){
            $conversation->last_message = "Tu: $message->content";
            $conversation->last_time =  $message->created_at;
            $conversation->save();
        }

        $conversation = Conversation::where('contact_id', $message->from_id)
        ->where('user_id', $message->to_id)->first();

        if($conversation){
            $conversation->last_message = "$conversation->contact_name: $message->content";
            $conversation->last_time =  $message->created_at;
            $conversation->save();
        }
        //event(new Messagesent($message));
    }
}

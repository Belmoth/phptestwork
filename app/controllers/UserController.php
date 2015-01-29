<?php

class UserController extends BaseController {
  public function showProfile()
  {
    $id = Auth::user()->id;
    $users = User::where('id', '<>', $id)->get();
    
    return View::make('user', array(
      'users' => $users
    ));
  }

  public function showMessages()
  {
    $id       = Auth::user()->id;
    $messages = Message::where('user_to', '=', $id)->get();

    return View::make('messages', array(
      'messages' => $messages
    ));
  }

  public function sendMessage()
  {
    $input = Input::all();
    
    $rules = array(
      'to' => 'required',
      'message_text' => 'required'
    );

    $validator = Validator::make($input, $rules);

    if ($validator->passes()) {
      $user_from = Auth::user()->nickname;
      $user_to   = User::where('nickname', '=', $input['to'])->get();

      $message = new Message;

      $message->user_from = $user_from;
      $message->user_to   = $user_to[ 0 ]->id;
      $message->text      = $input['message_text'];

      $message->save();

      return 'success';
    } else {
      return 'error';
    }
  }
}

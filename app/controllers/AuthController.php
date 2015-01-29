<?php

class AuthController extends BaseController {
  public function index()
  {
    return View::make('auth');
  }

  public function check()
  {
    $input = Input::all();

    $rules = array(
        'email'   => 'required|email',
        'password' => 'required'
    );

    $validator = Validator::make($input, $rules);

    if ($validator->fails()) {
      return Redirect::to('/')->withInput()->withErrors($validator);
    } else {
      $credentails = array(
        'email'    => Input::get('email'), 
        'password' => Input::get('password')
      );

      if (Auth::attempt($credentails)) {
        $nickname = Auth::user()->nickname;
        return Redirect::to('/user/' . $nickname);
      } else {
        return Redirect::to('/');
      } 
    }
  }

  public function logout() 
  {
    Auth::logout();
    return Redirect::to('/');
  }
}

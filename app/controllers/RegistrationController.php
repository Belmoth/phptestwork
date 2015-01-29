<?php

class RegistrationController extends BaseController {
  public function index() 
  {
    return View::make('registration');
  }

  public function signUp()
  {
    $input = Input::all();

    $rules = array(
        'nickname'   => 'required|unique:users',
        'password-1' => 'required',
        'email'      => 'required|unique:users|email'
    );

    $validator = Validator::make($input, $rules);

    if ($validator->passes()) {   
        $user = new User;

        $user->lastname   = $input['lastname'];
        $user->firstname  = $input['firstname'];
        $user->patronymic = $input['patronymic'];
        $user->nickname   = $input['nickname'];
        $user->password   = $input['password-1'];
        $user->password   = Hash::make( $user->password );
        $user->email      = $input['email'];

        $user->save();
        Auth::login($user);

        return Redirect::to('/user/' . $input['nickname']);
    } else {
        return Redirect::to('registration')->withInput()->withErrors($validator);
    }
  }
}

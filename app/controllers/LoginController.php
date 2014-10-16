<?php

class LoginController extends BaseController {

    public function showLogin() {
        if (Auth::check()) {
            return Redirect::to('/');
        }
        return View::make('login');
    }

    public function doLogin() {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login')
                                ->with('message', 'Login gagal, email atau password salah')
                                ->withInput(Input::except('password'));
            }
        }
    }

    public function doLogout() {
        Auth::logout();
        return Redirect::to('login');
    }

}

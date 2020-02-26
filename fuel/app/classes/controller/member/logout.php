<?php
class Controller_Member_Logout extends Controller
{
    public function action_index()
    {

        $auth = Auth::instance();
        $auth->logout();

        Response::redirect('login');

        // //変数としてビューを割り当てる
        // $view = View::forge('template/index');
        // $view->set('head',View::forge('template/head'));
        // $view->set('header',View::forge('member/header'));
        // $view->set('contents',View::forge('member/mypage'));
        // $view->set('footer',View::forge('template/footer'));
        //
        // // レンダリングした HTML をリクエストに返す
        // return $view;
    }
}

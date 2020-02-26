<?php
class Controller_login extends Controller
{
    const PASS_LENGTH_MIN = 6;
    const PASS_LENGTH_MAX = 20;

    public function action_index()
    {
        $error = '';
        $formData = '';

        // Fieldestクラスは、formの生成やバリデーションをしてくれる
        // 実際の生成やバリデーション処理はFormクラスとValidationクラスが行っている
        $form = Fieldset::forge('loginform');

        $form->add('email', 'Email', array('type'=>'email', 'placeholder'=>'Email'))
            ->add_rule('required')
            ->add_rule('valid_email')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 255);

        $form->add('password', 'Password', array('type'=>'password', 'placeholder'=>'パスワード'))
            ->add_rule('required')
            ->add_rule('min_length', self::PASS_LENGTH_MIN)
            ->add_rule('max_length', self::PASS_LENGTH_MAX);

        $form->add('submit', '', array('type'=>'submit', 'value'=>'ログイン'));

        // Input::method()でHTTPメソッドが返ってくるので、POSTかどうかを確認
        if (Input::method() === 'POST') {
            // バリデーションインスタンスを取得
            $val = $form->validation();
            if ($val->run()) {
                $formData = $val->validated();
                $auth = Auth::instance(); //Authインスタンス生成
                if($auth->login($_POST['email'], $_POST['password'])){
                  Response::redirect('member/post');
                  }else{
                    Session::set_flash('errMsg','ログインに失敗しました！');
                  }
            } else {
                // エラー格納
                $error = $val->error();
                // メッセージ格納
                Session::set_flash('errMsg','ログインに失敗しました！');
            }
            // フォームにPOSTされた値をセット
            $form->repopulate();
        }

        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header-login'));
        $view->set('contents',View::forge('auth/login'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('loginform', $form->build(''), false);
        $view->set_global('error', $error);

        // レンダリングした HTML をリクエストに返す
        return $view;
    }
}

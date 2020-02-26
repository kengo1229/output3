<?php
// Class 名の先頭には必ず Controller_ を付与すること
class Controller_Member_Post extends Controller
{
    // 読み込み機能
    public function action_index()
    {

        $posts = Model_Post::find('all');
        if(!Auth::check()){
          Response::redirect('login');
        }else{
          $view = View::forge('template/index');
          $view->set('head',View::forge('template/head'));
          $view->set('header',View::forge('member/header'));
          $view->set('contents',View::forge('member/post'));
          $view->set('footer',View::forge('template/footer'));
          $view->set_global('posts', $posts);
    // レンダリングした HTML をリクエストに返す
          return $view;
        }


    }
    // 登録機能
    public function action_add()
    {
        // if (Input::method() === 'GET') {
        //     return Response::forge(View::forge('todo/add'));
        // }

          return View::forge('member/post');
    }

    public function action_save(){
        $form = array();
        $form['title'] = Input::post('title');
        $form['thought'] = Input::post('thought');
        $form['created_at'] = date("Y-m-d H:i:s");

        $post = Model_Post::forge(); //Model_Postクラスのオブジェクトを作成
        $post->set($form); //setメソッドで、配列をpostオブジェクトに設定
        $post->save(); //saveメソッドで、テーブルにレコードを書き込む

        Response::redirect('member/post'); //投稿一覧ページへリダイレクト
    }
    // DB更新機能
    public function action_update($postId = null)
    {


        if ($postId === null) {
            return Response::redirect('member/post');
        }
// Input::method() === 'GET'でパラメーターに入っているpostのidを受け取る
        if (Input::method() === 'GET') {
            $post_data = Model_Post::find($postId);

            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('member/header'));
            $view->set('contents',View::forge('member/update'));
            $view->set('footer',View::forge('template/footer'));
            $view->set_global('postId', $postId);
            $view->set_global('title', $post_data['title']);
            $view->set_global('thought', $post_data['thought']);

      // レンダリングした HTML をリクエストに返す
            return $view;

        }



        if(Input::method() === 'POST') {

          $title = Input::post('title');
          $thought = Input::post('thought');

          $post = Model_Post::find($postId);
          $post->title = $title;
          $post->thought = $thought;
          $post->updated_at = date("Y-m-d H:i:s");
          $post->save();

          return Response::redirect('member/post');

        }
    }

    public function action_delete($postId = null)
    {
        if ($postId === null) {
            return Response::redirect('member/post');
        }

        if (Input::method() === 'GET') {
            $post_data = Model_Post::find($postId);
        }

        $post_data->delete();

        return Response::redirect('member/post');
    }
}

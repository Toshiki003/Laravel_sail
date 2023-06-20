<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{

    /**
     * index
     *
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        return view('translation');
    }

    /**
     * translation
     *
     * @param  Request  $request
     */
    public function translation(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);
        // 上記のコードの意味は、$request->sentenceが空でないことを確認するということ。
        // requiredは、空でないことを確認するバリデーションルール

        // 翻訳を行う文章
        $sentence = $request->input('sentence');
        // 上記のコードの意味は、$request->sentenceを取得するということ。
        // inputメソッドは、リクエストの値を取得するメソッド。Laravelのリクエストクラスに用意されているメソッドらしい。PHPの$_POSTと同じようなもの。
        // つまり、$request->input('sentence')は、$_POST['sentence']と同じ意味。
        // $_POSTは、HTTPリクエストのPOSTメソッドで送信されたデータを取得するためのスーパーグローバル変数。ちょっとまだよくわからない。
        // Rubyでは、params[:sentence]と書く。この方が今は理解がしっくりくる。

        // TODO: 翻訳処理を実装する
        
        // 翻訳結果をViewに渡す
        return view('translation', compact('sentence'));

        // Laravelはバリデーションをモデルではなく、コントローラーで行うことが多い
        // Railsよりもファットコントローラになりやすいのかな？
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        // 翻訳処理
        $response = Http::get(
            // 無料版URL
            'https://api-free.deepl.com/v2/translate',
            // GETパラメータ
            [
                'auth_key' => env('DEEPL_AUTH_KEY'),
                'text' => $sentence,
                'target_lang' => 'EN-US',
            ]
            );
        // 翻訳結果
        $translated_text = $response->json('translations')[0]['text'];
        
        // 翻訳結果をViewに渡す
        return view('translation', compact('sentence', 'translated_text'));

        // Laravelはバリデーションをモデルではなく、コントローラーで行うことが多い
        // Railsよりもファットコントローラになりやすいのかな？
    }
}
<?php

namespace Tests\Feature\Http\Controllers;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LessonControllerTest extends TestCase
{
  use RefreshDatabase;

    public function testShow()
    {
        //$response = $this->get('/lessons/1');
        //$thisを使えばスコープ外で定義された変数も使えるhttps://qiita.com/yyyykkkk/items/9de1a74b2b0f054bd392
        //まず最初に、テストしたい URL へアクセスするために TestCase::get() を呼ぶ。この場合の$thisはTestCase
        $lesson = factory(Lesson::class)->create(['name' => '楽しいヨガレッスン']);
        $response = $this->get("/lessons/{$lesson->id}");
        $response->assertStatus(Response::HTTP_OK);
        //assertStatusメソッドは返されたレスポンスが指定したHTTPステータスコードを持っていることをアサート（ある式・値が想定したものになっているかを確認する事）https://readouble.com/laravel/6.x/ja/http-tests.html
        //ステータスコードとはHTMLを表示する前にブラウザが受信する3桁の番号https://www.sakurasaku-labo.jp/blogs/status-code-basic-knowledges
        //$response->assertSee('楽しいヨガレッスン');
        //$response->assertSee('×');
        //assertSeeメソッド = 指定した文字列がレスポンスに含まれているか確認。https://qiita.com/taku-0728/items/8cc6bb2ce9ec54168686
        $response->assertSee($lesson->name);
        $response->assertSee('空き状況: ×');
    }
}

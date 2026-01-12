<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class HelloTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testName()
    {
        $response = $this->get('/');
        $response->assertSee('お名前');
    }

    public function testCategory()
    {
        $response = $this->get('/');
        // $response->assertSee('商品のお届けについて');
        // // $response->assertSeeInOrder([
        //     '商品のお届けについて',
        //     '商品の交換について',
        // ]);
    }

    public function testValidate()
    {
        $data = [
            'last_name' => '山田',
        ];
        $response = $this->post('/contacts/confirm', $data);
        // dd($response);
        $response->assertSessionHasErrors([
            'first_name' => '名前を入力してください'
        ]);
    }

    public function testTable()
    {
        $categories = [
            ['content' => '商品のお届けについて'],
            ['content' => '商品の交換について'],
            ['content' => '商品トラブル'],
            ['content' => 'ショップへのお問い合わせ'],
            ['content' => 'その他'],
        ];
        DB::table('categories')->insert($categories);
        $data = [
            'category_id' => 1,
            'last_name' => '山田',
            'first_name' => '太郎',
            'gender' => '太郎',
            'email' => '太郎',
            'tel' => '太郎',
            'address' => '太郎',
            'building' => '太郎',
            'detail' => '太郎',
            'image_file' => '太郎',
        ];
        $response = $this->post('/contacts', $data);
        // dd($response);
        $this->assertDatabaseHas('contacts', [
            'last_name' => '山田',
            'first_name' => '太郎',
        ]);
    }

    public function test_login()
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);
        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($user);
    }

    public function test_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/logout');
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}

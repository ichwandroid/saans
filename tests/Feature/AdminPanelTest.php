<?php

namespace Tests\Feature;

use App\Models\Content;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'email' => 'admin@saans.sch.id',
            'password' => Hash::make('password'),
        ]);
    }

    public function test_guest_is_redirected_to_login_when_accessing_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Panel Admin');
    }

    public function test_admin_can_authenticate_using_login_screen(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@saans.sch.id',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/admin');
    }

    public function test_admin_can_view_dashboard(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Panel Admin SAANS');
    }

    public function test_admin_can_update_general_site_info(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/general', [
            'name' => 'SAANS BARU',
            'title' => 'Sekolah Alam Unggulan Malang',
            'description' => 'Membentuk generasi pembelajar sejati.',
            'email' => 'kontak@saans.sch.id',
            'press_email' => 'ppdb@saans.sch.id',
            'press_phone' => '0341-999888',
        ]);

        $response->assertRedirect('/admin/general');
        $response->assertSessionHas('status');

        $saved = Content::get('site');
        $this->assertEquals('SAANS BARU', $saved['name']);
        $this->assertEquals('kontak@saans.sch.id', $saved['email']);
    }

    public function test_admin_can_update_faqs(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/faqs', [
            'faqs' => [
                [
                    'id' => 'qa-test-1',
                    'q' => 'Apakah ada tes masuk?',
                    'a' => 'Tidak ada tes akademis, melainkan observasi kesiapan tumbuh kembang.',
                ],
            ],
        ]);

        $response->assertRedirect('/admin/faqs');
        $response->assertSessionHas('status');

        $saved = Content::get('faqs');
        $this->assertCount(1, $saved);
        $this->assertEquals('Apakah ada tes masuk?', $saved[0]['q']);
    }

    public function test_admin_can_view_and_update_hero(): void
    {
        $viewResponse = $this->actingAs($this->admin)->get('/admin/hero');
        $viewResponse->assertStatus(200);
        $viewResponse->assertSee('Hero / Bagian Utama Beranda');

        $postResponse = $this->actingAs($this->admin)->post('/admin/hero', [
            'tagline_title' => 'SAANS Unggulan',
            'tagline_desc' => 'Sekolah Alam Terbaik di Jawa Timur',
            'badge_text' => 'Pendaftaran 2026/2027',
            'lead_text' => 'Mari bergabung bersama kami membentuk generasi berakhlak.',
            'cta_primary_text' => 'Daftar Sekarang',
            'cta_primary_href' => '#passes',
            'cta_secondary_text' => 'Pelajari Kurikulum',
            'cta_secondary_href' => '#programme',
            'image_1' => 'images/hero.jpg',
            'image_2' => 'images/hero2.jpg',
            'image_3' => 'images/hero3.jpg',
        ]);

        $postResponse->assertRedirect('/admin/hero');
        $postResponse->assertSessionHas('status');

        $saved = Content::get('hero');
        $this->assertEquals('SAANS Unggulan', $saved['tagline_title']);
        $this->assertEquals('Pendaftaran 2026/2027', $saved['badge_text']);
    }

    public function test_admin_can_view_and_update_navbar(): void
    {
        $viewResponse = $this->actingAs($this->admin)->get('/admin/navbar');
        $viewResponse->assertStatus(200);
        $viewResponse->assertSee('Menu Navigasi (Navbar)');

        $postResponse = $this->actingAs($this->admin)->post('/admin/navbar', [
            'cta_text' => 'Daftar PPDB',
            'cta_href' => '#passes',
            'links' => [
                ['label' => 'Pilar Program', 'href' => '#programme'],
                ['label' => 'Tim Pendidik', 'href' => '#artists'],
            ],
        ]);

        $postResponse->assertRedirect('/admin/navbar');
        $postResponse->assertSessionHas('status');

        $saved = Content::get('navbar');
        $this->assertEquals('Daftar PPDB', $saved['cta_text']);
        $this->assertCount(2, $saved['links']);
        $this->assertEquals('Pilar Program', $saved['links'][0]['label']);
    }
}

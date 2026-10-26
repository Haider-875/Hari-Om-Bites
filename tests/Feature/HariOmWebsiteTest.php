<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HariOmWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_loads_successfully_with_full_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Hari Om Cuisine Of India');
        $response->assertSee('1528 S Cushman St');
        $response->assertSee('+1 907-328-3218');
        $response->assertSee('Explore our menu');
        $response->assertSee('Slow-cooked');
        $response->assertSee('Where flavor lives');
    }

    public function test_digital_menu_page_loads_with_categories_and_items(): void
    {
        $response = $this->get('/menu');

        $response->assertStatus(200);
        $response->assertSee('The digital menu');
        $response->assertSee('Appetizers');
        $response->assertSee('Papad');
        $response->assertSee('Vegetable Samosas');
        $response->assertSee('Rogan Josh');
        $response->assertSee('Thali Platter');
        $response->assertSee('Our Menu');
    }

    public function test_menu_api_returns_json_categories(): void
    {
        $response = $this->getJson('/api/menu');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'slug', 'name', 'tagline', 'menu_items']
        ]);
        $this->assertCount(8, $response->json());
    }

    public function test_customer_can_submit_table_reservation(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+1 907-555-0199',
            'guests' => 4,
            'date' => now()->addDays(2)->format('Y-m-d'),
            'time' => '7:00 PM',
            'special_requests' => 'Window table if available',
        ];

        $response = $this->post('/reservation', $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('reservations', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'guests' => 4,
        ]);
    }

    public function test_customer_can_submit_contact_message(): void
    {
        $data = [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'phone' => '+1 907-555-0144',
            'subject' => 'Catering Inquiry',
            'message' => 'Interested in catering for a party of 30 in Fairbanks.',
        ];

        $response = $this->post('/contact', $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Sarah Connor',
            'subject' => 'Catering Inquiry',
        ]);
    }

    public function test_admin_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@hariombites.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticated();

        $dashboardResponse = $this->get('/admin');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Dashboard Overview');
        $dashboardResponse->assertSee('Total Menu Items');
    }
}

<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyEndpointTest extends TestCase
{
    use RefreshDatabase;

    public function test_gecersiz_veri_422_doner(): void
    {
        $response = $this->postJson('/api/sirketler', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'tax_number', 'company_type']);
    }

    public function test_gecerli_veri_201_ile_kaydeder(): void
    {
        $payload = [
            'name' => 'Örnek Yazılım Ltd. Şti.',
            'tax_number' => '1234567890',
            'company_type' => 'limited',
            'email' => 'info@ornek.com',
            'phone' => '02165990010',
            'city' => 'İstanbul',
        ];

        $response = $this->postJson('/api/sirketler', $payload);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Örnek Yazılım Ltd. Şti.');

        $this->assertDatabaseHas('companies', [
            'tax_number' => '1234567890',
            'company_type' => 'limited',
        ]);
    }

    public function test_tax_number_benzersiz_olmali(): void
    {
        Company::create([
            'name' => 'İlk Şirket',
            'tax_number' => '1112223334',
            'company_type' => 'anonim',
        ]);

        $response = $this->postJson('/api/sirketler', [
            'name' => 'İkinci Şirket',
            'tax_number' => '1112223334',
            'company_type' => 'limited',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['tax_number']);
    }
}

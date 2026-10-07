<?php

namespace Tests\Feature;

use App\Models\Cabang;
use App\Models\KelasKursus;
use App\Models\Pendaftaran;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class StrukturKursusTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_seeding_creates_two_branches_without_duplicates_or_demo_accounts(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->seed(DatabaseSeeder::class);

        $this->assertDatabaseCount('branches', 2);
        $this->assertDatabaseHas('branches', ['slug' => 'jakarta-pusat', 'name' => 'Jakarta Pusat', 'address' => null]);
        $this->assertDatabaseHas('branches', ['slug' => 'jakarta-selatan', 'name' => 'Jakarta Selatan', 'address' => null]);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_registration_belongs_to_whole_class_and_hides_personal_data(): void
    {
        $branch = Cabang::factory()->create();
        $courseClass = KelasKursus::factory()->for($branch, 'branch')->create();

        $registration = Pendaftaran::factory()->for($courseClass, 'courseClass')->create();

        $this->assertSame($branch->id, $registration->courseClass->branch->id);
        $this->assertSame($registration->id, $courseClass->registrations()->first()->id);
        $this->assertDatabaseHas('registrations', ['id' => $registration->id, 'status' => 'pending']);
        foreach (['child_name', 'child_age', 'parent_name', 'parent_phone', 'parent_email'] as $field) {
            $this->assertArrayNotHasKey($field, $registration->toArray());
        }
    }
}

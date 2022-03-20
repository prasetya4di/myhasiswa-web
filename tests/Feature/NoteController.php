<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Note;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class NoteController extends TestCase
{
    use RefreshDatabase;

    private Generator $faker;

    public function test_create_note_should_add_new_data_if_success()
    {
        $matkul = MataKuliah::factory()->create();
        $note = array(
            "mata_kuliah_kode_matkul" => $matkul->kode_matkul,
            "tanggal" => $this->faker->date(),
            "note" => $this->faker->realText()
        );
        $response = $this->post('/api/note', $note);

        $response->assertCreated();
        $this->assertDatabaseHas('note', $note);
    }

    public function test_edit_note_should_change_data_if_success()
    {
        $oldnote = Note::factory()->create();
        $note = array(
            "mata_kuliah_kode_matkul" => $oldnote->mata_kuliah_kode_matkul,
            "tanggal" => $this->faker->date(),
            "note" => $this->faker->realText()
        );
        $response = $this->put('/api/note/' . $oldnote->id, $note);

        $response->assertOk();
        $this->assertDatabaseHas('note', $note);
    }

    public function test_edit_note_should_return_404_if_id_not_found()
    {
        $oldnote = Note::factory()->create();
        $note = array(
            "mata_kuliah_kode_matkul" => $oldnote->mata_kuliah_kode_matkul,
            "tanggal" => $this->faker->date(),
            "note" => $this->faker->realText()
        );
        $response = $this->put('/api/note/' . $this->faker->randomLetter(), $note);

        $response->assertNotFound();
    }

    public function test_index_note_should_return_all_note_from_logged_in_user()
    {
        Note::factory()->count(5)->create();
        $response = $this->get('/api/note');

        $response->assertOk();
        $response->assertJsonCount(5, "data");
    }

    public function test_show_note_should_return_note_based_on_given_id()
    {
        $note = Note::factory()->create();

        $response = $this->get('/api/note/' . $note->id);

        $response->assertOk();
    }

    public function test_show_note_should_return_404_if_not_found()
    {
        $response = $this->get('/api/note/' . $this->faker->randomLetter());

        $response->assertNotFound();
    }

    public function test_soft_delete_note_should_return_success_message_if_success()
    {
        $note = Note::factory()->create();

        $response = $this->delete('/api/note/' . $note->id);

        $response->assertOk();
        $this->assertDatabaseMissing('note', [
            'id' => $note->id
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
        $user = User::factory()->has(Mahasiswa::factory())->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );
    }
}

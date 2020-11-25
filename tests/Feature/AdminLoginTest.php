<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Admin\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_admin_login_page()
    {
        $this->get(route('admin.login'))
            ->assertSuccessful()
            ->assertSeeLivewire('admin.login');
    }

    /** @test */
    public function is_redirected_if_already_logged_in()
    {
        auth()->login(User::factory()->create());

        $this->get(route('admin.login'))
            ->assertRedirect(route('admin.dashboard'));
    }

    /** @test */
    public function it_throws_unauthorized_error_if_user_is_not_admin()
    {
        $user = User::factory()->create([
            'roles' => 'member',
        ]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertStatus(403);

    }

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->create([
            'roles' => 'admin',
        ]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login');

        $this->assertAuthenticatedAs($user);

        //TODO:this will pass even though it's a member
        //$this->actingAs($user);
        //
        //$this->assertTrue(
        //    auth()->user()->is(User::where('email', $user->email)->first())
        //);
    }

    /** @test */
    public function is_redirected_to_dashboard_after_login()
    {
        //$this->withoutExceptionHandling();

        $user = User::factory()->create([
            'roles' => 'admin',
        ]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect(route('admin.dashboard'));
    }

    /** @test */
    public function email_is_required()
    {
        User::factory()->create();

        Livewire::test(Login::class)
            ->set('password', 'password')
            ->call('login')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function email_must_be_valid_email()
    {
        User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', 'invalid-email')
            ->set('password', 'password')
            ->call('login')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function password_is_required()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->call('login')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function bad_login_attempt_shows_message()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'bad-password')
            ->call('login')
            ->assertHasErrors('email');

        $this->assertFalse(Auth::check());
        //$this->assertNull(auth()->user());
    }

}

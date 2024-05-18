<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;


use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;


class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->status == 'active') {
                    return $user;
                } else {
                    // El usuario no está activo, lanzar una excepción de validación con un mensaje específico
                    throw ValidationException::withMessages(['alerta' => 'El usuario está inactivo']);
                }
            } else {
                // El usuario no está activo, lanzar una excepción de validación con un mensaje específico
                throw ValidationException::withMessages(['error' => 'las credenciales no coinciden con nuestros registros.']);
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Email\RespuestaForm;
use Illuminate\Support\Facades\Artisan;
Route::get('/instalar-todo', function () {
    try {
        // 'migrate:fresh' borra todo lo viejo y lo crea de nuevo correctamente
        Artisan::call('migrate:fresh', ['--force' => true]);
        
        // Si tienes datos iniciales (Seeders), descomenta la línea de abajo:
        // Artisan::call('db:seed', ['--force' => true]);
        
        return "✅ ¡BINGO! Tablas creadas desde cero:<br><pre>" . Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "❌ Error detallado: " . $e->getMessage();
    }
});
// 1. HOME
Route::get('/', function () {
    return view('pages.home'); })->name('home');
// En web.php
Route::post('/enviar-formulario', [RespuestaForm::class, 'enviarContacto'])->name('contacto.enviar');Route::get('/servicios', [ServiciosController::class, 'serviciosIndex'])->name('servicios.index');
Route::get('/experiencias', [ServiciosController::class, 'experienciasIndex'])->name('experiencias.index');

// 3. AUTENTICACIÓN
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registro', [RegisterController::class, 'register']);

// Si el login falla o se pide via URL, redirigimos a la home (donde está el modal)
Route::get('/login', function() { return redirect('/')->with('error_login', true); })->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// 4. ZONA DE USUARIO (Protegida por Auth)
Route::middleware(['auth'])->group(function () {
    // Perfil
    Route::get('/perfil', [LoginController::class, 'showPerfil'])->name('perfil');
    // El {id?} con el signo de interrogación indica que es opcional
    Route::get('/perfil/edit/{id?}', [LoginController::class, 'editPerfil'])->name('perfil.edit');
    Route::post('/perfil/actualizar', [LoginController::class, 'updatePerfil'])->name('perfil.update');

    // RESERVAS (Servicios y Experiencias usan estas mismas rutas)
    Route::get('/mis-reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservar', [ReservaController::class, 'store'])->name('reservas.store');
    Route::delete('/reserva/{id}', [ReservaController::class, 'destroy'])->name('reserva.destroy');
});

// 5. ZONA ADMINISTRADOR
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/usuarios', [LoginController::class, 'indexUsuarios'])->name('admin.usuarios');
    Route::get('/servicios', [ServiciosController::class, 'adminIndex'])->name('admin.servicios.index');
    Route::get('/servicios/crear', [ServiciosController::class, 'create'])->name('admin.servicios.create');
    Route::post('/servicios/guardar', [ServiciosController::class, 'store'])->name('admin.servicios.store');
    Route::get('/servicios/editar/{id}', [ServiciosController::class, 'edit'])->name('admin.servicios.edit');
      // Ruta para el botón dorado "Gestión Reservas"
    Route::get('/reservas', [AdminController::class, 'indexReservas'])->name('admin.reservas.index');    
    // Ruta para borrar (desde la tabla del admin)
    Route::delete('/reservas/{id}', [AdminController::class, 'destroyReserva'])->name('admin.reservas.destroy');

});

// forzar correo de prueba 
use App\Mail\BienvenidaUsuario;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

Route::get('/test-mail', function () {
    $user = User::first(); // Cogemos cualquier usuario de tu base de datos
    
    if (!$user) {
        return "No hay usuarios en la base de datos para probar.";
    }

    try {
        Mail::to($user->email)->send(new BienvenidaUsuario($user));
        return "¡Correo enviado! Revisa Mailtrap.";
    } catch (\Exception $e) {
        return "Error al enviar: " . $e->getMessage();
    }
});


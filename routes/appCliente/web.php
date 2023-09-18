<?php

use App\Http\Controllers\AppCliente\AppClienteController;
use App\Http\Controllers\AppCliente\miprestamo;
use App\Http\Controllers\AppCliente\PagoController;
use App\Http\Controllers\AppCliente\SolicitarCredito;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Juan Carlos Segura Torres */
    Route::middleware(['auth','isUser'])->group(function (){
        Route::get('/dashboard', [AppClienteController::class, 'index'])->name('dashboard');
        /*Vista Solicitar credito junto con la petición post */
        Route::get('/solicitar-credito', [SolicitarCredito::class, 'solicitar'])->name('solicitar-credito');
        Route::post('/solicitar-credito', [SolicitarCredito::class ,'store'])->name('solicitar');
        Route::get('/miPrestamo', [AppClienteController::class, 'miprestamo'])->name('miPrestamo');
        Route::get('/ajustes-contacto', [AppClienteController::class, 'ajustescontacto'])->name('ajustes-contacto');
        Route::get('/cliente-notificaciones/{id}', [AppClienteController::class, 'notificaciones'])->name('cliente-notificaciones');
        
        Route::delete('/eliminar/{id}',[AppClienteController::class, 'destroy'])->name('notificacion.destroy');
        Route::get('/mi-perfil', [AppClienteController::class,'miperfil'])->name('miperfil');
        Route::get('cambio-password',[AppClienteController::class,'campassword'])->name('cambio-password');
        Route::get('/contacto', [AppClienteController::class, 'contacto'])->name('contacto');  
        
        Route::post('/metodo_pago',[PagoController::class,'store'])->name('pago.store');
        Route::get('/eliminar-cliente/{id}',[PagoController::class,'delete']);
    });
    
    Route::post('/logout', [AppClienteController::class, 'logout'])->name('logout')->middleware('auth');

    Route::middleware('guest')->group(function (){
        Route::get('change-password/{token}', [AppClienteController::class,'password'])->name('change-password');
        Route::post('shift-password', [AppClienteController::class,'changepassword'])->name('shift-password');
    });
    /*Redirect para raiz del proyecto */
    Route::get('direccion', function(){
        if(Auth::check()){
            if(Auth::user()->rol==1){
                return redirect()->route('dashboard.backoffice');
            }
            if(Auth::user()->rol==0){
                return redirect()->route('dashboard');
            }
        }else{
            return App::abort(404);
        }

    });


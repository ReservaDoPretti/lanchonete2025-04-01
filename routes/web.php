<?php

use App\Http\Livewire\CadastroCliente;
use Illuminate\Support\Facades\Route;


Route::get('/cadastro-cliente', CadastroCliente::class)->name('cadastro-cliente');
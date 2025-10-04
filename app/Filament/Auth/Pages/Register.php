<?php

namespace App\Filament\Auth\Pages;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255)
                    ->autocomplete('name'),
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email()
                    ->unique(User::class, 'email')
                    ->required(),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->revealable()
                    ->required()
                    ->minLength(8)
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->label(__('Confirm password'))
                    ->password()
                    ->revealable()
                    ->required()
                    ->dehydrated(false),
            ])
            ->statePath('data');
    }

    protected function handleRegistration(array $data): Authenticatable
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

<?php

namespace App\Filament\Auth\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email()
                    ->required()
                    ->autocomplete('username'),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->revealable()
                    ->required()
                    ->autocomplete('current-password'),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }
}

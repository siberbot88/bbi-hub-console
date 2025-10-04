<?php

namespace App\Filament\Auth\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\PasswordReset\RequestPasswordReset;

class ForgotPassword extends RequestPasswordReset
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email()
                    ->required(),
            ])
            ->statePath('data');
    }
}

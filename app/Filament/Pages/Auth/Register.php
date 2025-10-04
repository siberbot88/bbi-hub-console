<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Schema;

class Register extends BaseRegister
{
    /**
     * Override the Filament v4 register form to optionally expose a username field
     * while keeping the default inputs (name, email, password & confirmation).
     *
     * @see \Filament\Auth\Pages\Register::form()
     */
    public function form(Form $form): Form
    {
        $form = parent::form($form);

        $userModelClass = $this->resolveUserModelClass();
        $userModel = app($userModelClass);
        $userTable = $userModel->getTable();

        $hasUsernameColumn = Schema::hasColumn($userTable, 'username');

        $schema = [
            TextInput::make('name')
                ->label(__('filament-panels::pages/auth/register.form.name.label'))
                ->required()
                ->autofocus()
                ->maxLength(255),
            TextInput::make('email')
                ->label(__('filament-panels::pages/auth/register.form.email.label'))
                ->email()
                ->required()
                ->maxLength(255)
                ->unique($userTable, 'email'),
        ];

        if ($hasUsernameColumn) {
            $schema[] = TextInput::make('username')
                ->label(__('Username'))
                ->maxLength(255)
                ->unique($userTable, 'username')
                ->helperText(__('Optional. Leave empty if you do not want to use a username.'));
        }

        $schema = array_merge($schema, [
            TextInput::make('password')
                ->label(__('filament-panels::pages/auth/register.form.password.label'))
                ->password()
                ->required()
                ->rule(static::getPasswordValidationRules())
                ->autocomplete('new-password'),
            TextInput::make('passwordConfirmation')
                ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
                ->password()
                ->same('password')
                ->required()
                ->autocomplete('new-password'),
        ]);

        return $form->schema($schema);
    }

    /**
     * Resolve the authenticatable model class that Filament uses for registration.
     */
    protected function resolveUserModelClass(): string
    {
        $guard = config('filament.auth.guard') ?? config('auth.defaults.guard');

        $provider = config('filament.auth.provider')
            ?? config("auth.guards.{$guard}.provider")
            ?? (config('auth.defaults.guard')
                ? config('auth.guards.' . config('auth.defaults.guard') . '.provider')
                : null)
            ?? 'users';

        return config("auth.providers.{$provider}.model") ?? \App\Models\User::class;
    }
}

/*
|--------------------------------------------------------------------------
| Panel Provider adjustments
|--------------------------------------------------------------------------
| Inside your Filament panel provider's `panel()` method ensure registration
| pages are discovered and enabled:
|
|    use App\Filament\Pages; // at the top
|
|    public function panel(Panel $panel): Panel
|    {
|        return $panel
|            // ...other configuration
|            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
|            ->registration(true);
|    }
|
| Clearing caches after making changes (recommended):
|    php artisan optimize:clear
|    php artisan filament:cache:clear
|
| Optional username column migration example:
|    php artisan make:migration add_username_to_users_table --table=users
|
|    public function up(): void
|    {
|        Schema::table('users', function (Blueprint $table): void {
|            $table->string('username')->unique()->nullable()->after('email');
|        });
|    }
|
|    public function down(): void
|    {
|        Schema::table('users', function (Blueprint $table): void {
|            $table->dropColumn('username');
|        });
|    }
*/

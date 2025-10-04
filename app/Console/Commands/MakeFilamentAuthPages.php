<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeFilamentAuthPages extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'make:filament-auth-pages {--force : Overwrite existing auth pages if they already exist}';

    /**
     * The console command description.
     */
    protected $description = 'Scaffold the Filament authentication pages.';

    public function handle(): int
    {
        $filesystem = new Filesystem();
        $pagesDirectory = app_path('Filament/Auth/Pages');

        $filesystem->ensureDirectoryExists($pagesDirectory);

        foreach ($this->stubs() as $name => $contents) {
            $path = $pagesDirectory.DIRECTORY_SEPARATOR.$name.'.php';

            if ($filesystem->exists($path) && ! $this->option('force')) {
                $this->warn("Skipped {$name}: {$path} already exists. Use --force to overwrite.");

                continue;
            }

            $filesystem->put($path, $contents);

            $this->info("Created {$path}");
        }

        $this->components->info('Filament auth pages scaffolding complete.');

        return self::SUCCESS;
    }

    /**
     * Get the stub contents keyed by class name.
     *
     * @return array<string, string>
     */
    protected function stubs(): array
    {
        return [
            'Login' => $this->loginStub(),
            'Register' => $this->registerStub(),
            'ForgotPassword' => $this->forgotPasswordStub(),
        ];
    }

    protected function loginStub(): string
    {
        return <<<'PHP'
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
PHP;
    }

    protected function registerStub(): string
    {
        return <<<'PHP'
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
PHP;
    }

    protected function forgotPasswordStub(): string
    {
        return <<<'PHP'
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
PHP;
    }
}

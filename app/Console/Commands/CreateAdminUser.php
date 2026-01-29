<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user interactively';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $first_name = $this->ask("Enter first name");

        if (!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $first_name)) {
            $this->error('First name must contain only letters and spaces.');
            return Command::FAILURE;
        }

        $last_name = $this->ask("Enter last name");

        if (!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $last_name)) {
            $this->error('Last name must contain only letters and spaces.');
            return Command::FAILURE;
        }

        $phone = $this->ask("Enter your phone number: ");

        if (!preg_match('/^\+998\d{9}$/', $phone)) {
            $this->error("Phone number is not valid.");
            return Command::FAILURE;
        }

        if (User::where('phone', $phone)->exists()) {
            $this->error("A user with this phone already exists.");
            return Command::FAILURE;
        }

        $password = $this->secret("Enter password");

        if (!$password) {
            $this->error("Password cannot be empty.");
            return Command::FAILURE;
        }

        $confirm = $this->secret("Confirm password");

        if ($password != $confirm) {
            $this->error("Passwords do not match.");
            return Command::FAILURE;
        }

        DB::transaction(function () use ($first_name, $last_name, $phone, $password) {
            (new User())->forceFill([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone,
                'password' => Hash::make($password),
                'role' => "admin"
            ])->save();
        });

        $this->info("Admin user created successfully.");
        return Command::SUCCESS;
    }
}

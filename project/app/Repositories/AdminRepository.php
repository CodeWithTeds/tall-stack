<?php
namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminRepository
{
    public function findByEmail(string $email): ?Admin
    {
        return Admin::wher('email', $email)->first();
    }
}
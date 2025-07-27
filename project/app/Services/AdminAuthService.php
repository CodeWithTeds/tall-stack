<?php

namespace App\Services;

use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Session;


class AdminAuthService
{
    /**
     * Construction property promotion
     * To prevent boilerplate code or Repetition of code
     */
    public function __construct(
        protected AdminRepository $adminRepo
    ) {}
    

    public function attemptLogin($email, $password): bool 
    {
        $admin = $this->adminRepo->findByEmail($email);

        if(!$admin || $admin->password !== $password) {
            return false;
        }

        Session::put('admin_logged_in', true);
        return true;
    }

    public function logout(): void
    {
        Session::forget('admin_logged_in');
    }

    public function isAuthenticated(): bool
    {
        return Session::get('admin_logged_in') === true;
    }
}

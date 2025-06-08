# Laravel Leave Manager

A web-based employee leave management system built with Laravel 10. Employees can submit leave requests and managers can review and manage them through an intuitive dashboard.

## 🚀 Features

- ✅ Role-based access: Admin, Manager, Employee
- ✅ Submit and track leave requests
- ✅ Approve / Reject leave requests by manager
- ✅ Leave types management (e.g., annual, sick, unpaid)
- ✅ Leave balance tracking
- ✅ Notifications (optional via Mailtrap)
- ✅ Dashboard with stats and recent activity
- ✅ Validation and error handling
- ✅ Audit trail or logs (optional)

## 🧰 Built With

- [Laravel 10](https://laravel.com/)
- MySQL
- Blade or Inertia.js (depending on your setup)
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) – for role and permission management
- [Mailtrap](https://mailtrap.io/) – for email notifications (optional)

## 📦 Installation

```bash
git clone https://github.com/elsibakhi/laravel-leave-manager.git
cd laravel-leave-manager

composer install
cp .env.example .env
php artisan key:generate

# Update your .env with DB and mail settings

php artisan migrate --seed
php artisan serve


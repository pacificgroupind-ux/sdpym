# Shri ABCD Mahavidyalaya Website (PHP + MySQL)

Dynamic multi-page college website with admin panel, admission workflow, notices, faculty management, gallery, student portal, role-based access, and NAAC/NIRF-oriented pages.

## Quick Start

1. Create database and import schema:
   - `database/schema.sql`
2. Configure DB + SMTP in:
   - `config/config.php`
3. Run local server:
   - `php -S 0.0.0.0:8000`
4. Open:
   - Public site: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin/login.php`
   - Student portal: `http://localhost:8000/student/login.php`

## Default Demo Users

- Super Admin: `superadmin@abcd.edu.in` / `password123`
- Staff Admin: `staff@abcd.edu.in` / `password123`
- Editor Admin: `editor@abcd.edu.in` / `password123`
- Student: `student@abcd.edu.in` / `password123`

> Change passwords in production.

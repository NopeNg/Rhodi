<?php
// Staff routes
Route::middleware(['auth:employee', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    // Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');
});
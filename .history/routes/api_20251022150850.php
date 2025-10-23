/ Authentication Routes (Publicly Accessible)
Route::prefix('auth')->group(function () {
    // Route for new user registration
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    
    // TODO: Add login route here later
    // Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});
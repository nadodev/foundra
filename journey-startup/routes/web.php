<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Startup Journey
|--------------------------------------------------------------------------
*/

// Rotas Públicas e Apresentação
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/public-passport', 'publicPassport')->name('passport.public');
    Route::get('/pages', 'allPages')->name('pages.index');
    Route::get('/all-pages.html', 'allPages');
});

// Rotas de Autenticação (GET livres — POST protegidos por throttle)
Route::get('/login', [PublicController::class, 'login'])->name('login');
Route::get('/register', [PublicController::class, 'register'])->name('register');

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:login');
    Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('throttle:registration');
});

Route::middleware('auth')->group(function () {
    Route::post('/ai/generate-field', [GeminiController::class, 'generateField'])->name('ai.field.generate');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/role-select', [OnboardingController::class, 'roleSelect'])->name('role.select');
    Route::put('/role-select', [OnboardingController::class, 'updateOrganizationType'])->name('role.select.update');

    // Fluxo de Onboarding e Criação de Startup
    Route::controller(OnboardingController::class)->group(function () {
        Route::get('/onboarding', 'onboarding')->name('onboarding');
        Route::put('/onboarding', 'storeOnboardingContext')->name('onboarding.update');
        Route::get('/create-startup', 'createStartup')->name('startup.create');
        Route::post('/create-startup', 'storeStartup')->name('startup.store');
        Route::get('/analysis', 'analysis')->name('startup.analysis');
    });

    // Área do Empreendedor
    Route::controller(EntrepreneurController::class)->group(function () {
        Route::get('/overview', 'overview')->name('entrepreneur.overview');
        Route::get('/journey', 'journey')->name('entrepreneur.journey');
        Route::get('/history', 'history')->name('entrepreneur.history');
        Route::get('/validation', 'validation')->name('entrepreneur.validation');
        Route::get('/experiments', 'experiments')->name('entrepreneur.experiments');
        Route::get('/research', 'research')->name('entrepreneur.research');
        Route::get('/evidence', 'evidence')->name('entrepreneur.evidence');
        Route::get('/interviews', 'interviews')->name('entrepreneur.interviews');
        Route::get('/interviews/new', 'newInterview')->name('entrepreneur.interviews.new');
        Route::get('/interviews/detail', 'interviewDetail')->name('entrepreneur.interviews.detail');
        Route::get('/competitors', 'competitors')->name('entrepreneur.competitors');
        Route::get('/business-model', 'businessModel')->name('entrepreneur.business-model');
        Route::get('/mvp', 'mvp')->name('entrepreneur.mvp');
        Route::get('/pitch', 'pitch')->name('entrepreneur.pitch');
        Route::get('/pitch-coach', 'pitchCoach')->name('entrepreneur.pitch-coach');
        Route::get('/readiness', 'readiness')->name('entrepreneur.readiness');
        Route::get('/passport', 'passport')->name('entrepreneur.passport');
        Route::get('/milestones', 'milestones')->name('entrepreneur.milestones');
        Route::get('/mentors', 'mentors')->name('entrepreneur.mentors');
        Route::get('/documents', 'documents')->name('entrepreneur.documents');
        Route::get('/notifications', 'notifications')->name('entrepreneur.notifications');
        Route::get('/journey-ai', 'journeyAi')->name('entrepreneur.journey-ai');
        Route::get('/settings', 'settings')->name('entrepreneur.settings');
        Route::put('/settings/profile', 'updateProfile')->name('entrepreneur.settings.profile.update');
        Route::put('/settings/startup', 'updateStartup')->name('entrepreneur.settings.startup.update');
    });

    // Área do Programa de Inovação / Aceleração
    Route::prefix('program')->name('program.')->controller(ProgramController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/startups', 'startups')->name('startups');
        Route::get('/startup-detail', 'startupDetail')->name('startup.detail');
        Route::get('/cohort', 'cohort')->name('cohort');
        Route::get('/mentors', 'mentors')->name('mentors');
        Route::get('/reports', 'reports')->name('reports');
        Route::get('/notifications', 'notifications')->name('notifications');
        Route::get('/settings', 'settings')->name('settings');
    });

    // Área do Mentor
    Route::prefix('mentor')->name('mentor.')->controller(MentorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/startups', 'startups')->name('startups');
        Route::get('/startup-detail', 'startupDetail')->name('startup.detail');
        Route::get('/sessions', 'sessions')->name('sessions');
        Route::get('/feedback', 'feedback')->name('feedback');
        Route::get('/profile', 'profile')->name('profile');
    });

    // Área de Investidores (Conceitual)
    Route::prefix('investor')->name('investor.')->controller(InvestorController::class)->group(function () {
        Route::get('/discovery', 'discovery')->name('discovery');
    });
});

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/salam', 'Assalamualaikum::salam');

$routes->get('/login', 'AuthController::login');
$routes->post('/login/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index');

// Rute untuk pasien
$routes->get('/patients', 'PatientController::index');
$routes->get('/patients/create', 'PatientController::create');
$routes->post('/patients/store', 'PatientController::store');
$routes->get('/patients/edit/(:num)', 'PatientController::edit/$1');
$routes->post('/patients/update/(:num)', 'PatientController::update/$1');
$routes->get('/patients/delete/(:num)', 'PatientController::delete/$1');


// Rute untuk dokter
$routes->get('/doctors', 'DoctorController::index');
$routes->get('/doctors/create', 'DoctorController::create');
$routes->post('/doctors/store', 'DoctorController::store');
$routes->get('/doctors/edit/(:num)', 'DoctorController::edit/$1');
$routes->post('/doctors/update/(:num)', 'DoctorController::update/$1');
$routes->get('/doctors/delete/(:num)', 'DoctorController::delete/$1');

// Rute untuk obat
$routes->get('/medications', 'MedicationController::index');
$routes->get('/medications/create', 'MedicationController::create');
$routes->post('/medications/store', 'MedicationController::store');
$routes->get('/medications/edit/(:num)', 'MedicationController::edit/$1');
$routes->post('/medications/update/(:num)', 'MedicationController::update/$1');
$routes->get('/medications/delete/(:num)', 'MedicationController::delete/$1');

// Medical Record
$routes->get('/medical-records', 'MedicalRecordController::index');
$routes->get('/medical-records/create', 'MedicalRecordController::create');
$routes->post('/medical-records/store', 'MedicalRecordController::store');
$routes->get('/medical-records/edit/(:num)', 'MedicalRecordController::edit/$1');
$routes->post('/medical-records/update/(:num)', 'MedicalRecordController::update/$1');
$routes->get('/medical-records/delete/(:num)', 'MedicalRecordController::delete/$1');

// Reports
$routes->get('/reports', 'ReportController::index');
$routes->get('/reports/filter', 'ReportController::filter');
$routes->get('/reports/create', 'ReportController::create');
$routes->post('/reports/store', 'ReportController::store');
$routes->get('/reports/edit/(:segment)', 'ReportController::edit/$1');
$routes->post('/reports/update/(:segment)', 'ReportController::update/$1');
$routes->get('/reports/delete/(:segment)', 'ReportController::delete/$1');



<?php

namespace Config;

use App\Controllers\RekapAllDataController;
use App\Controllers\PemeriksaController;
use App\Controllers\PacController;
use App\Controllers\UtilityController;
use App\Controllers\IpduController;
use App\Controllers\SystemUpsController;
use App\Controllers\ModulUpsController;
use App\Controllers\ChillerController;
use App\Controllers\LcpController;
use App\Controllers\VesdaController;
use App\Controllers\TabungController;
use App\Controllers\FireController;
use App\Controllers\CctvController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('pemeriksa', [PemeriksaController::class, 'index']);
$routes->get('pemeriksa/create', [PemeriksaController::class, 'create']);
$routes->post('pemeriksa/store', [PemeriksaController::class, 'store']);
$routes->get('export-pemeriksa', 'PemeriksaController::exportToExcel');
$routes->get('pac', [PacController::class, 'index']);
$routes->get('pac/create', [PacController::class, 'create']);
$routes->post('pac/store', [PacController::class, 'store']);
$routes->get('pac/getDataByMonth', 'PacController::getDataByMonth');
$routes->get('pac/getChartDataByMonth', 'PacController::getChartDataByMonth');
$routes->get('export-pac', 'PacController::exportToExcel');
$routes->get('utility', [UtilityController::class, 'index']);
$routes->get('utility/create', [UtilityController::class, 'create']);
$routes->post('utility/store', [UtilityController::class, 'store']);
$routes->get('utility/getDataByMonth', 'UtilityController::getDataByMonth');
$routes->get('utility/getChartDataByMonth', 'UtilityController::getChartDataByMonth');
$routes->get('export-utility', 'UtilityController::exportToExcel');
$routes->get('ipdu', [IpduController::class, 'index']);
$routes->get('ipdu/create', [IpduController::class, 'create']);
$routes->get('ipdu/getDataByMonth', 'IpduController::getDataByMonth');
$routes->get('ipdu/getChartDataByMonth', 'IpduController::getChartDataByMonth');
$routes->post('ipdu/store', [IpduController::class, 'store']);
$routes->get('export-ipdu', 'IpduController::exportToExcel');
$routes->get('systemups', [SystemUpsController::class, 'index']);
$routes->get('systemups/create', [SystemUpsController::class, 'create']);
$routes->post('systemups/store', [SystemUpsController::class, 'store']);
$routes->get('systemups/getDataByMonth', 'SystemUpsController::getDataByMonth');
$routes->get('systemups/getChartDataByMonth', 'SystemUpsController::getChartDataByMonth');
$routes->get('export-systemups', 'SystemUpsController::exportToExcel');
$routes->get('modulups', [ModulUpsController::class, 'index']);
$routes->get('modulups/create', [ModulUpsController::class, 'create']);
$routes->post('modulups/store', [ModulUpsController::class, 'store']);
$routes->get('modulups/getDataByMonth', 'ModulUpsController::getDataByMonth');
$routes->get('export-modulups', 'ModulUpsController::exportToExcel');
$routes->get('chiller', [ChillerController::class, 'index']);
$routes->get('chiller2', [ChillerController::class, 'index2']);
$routes->get('chiller3', [ChillerController::class, 'index3']);
$routes->get('chiller/create', [ChillerController::class, 'create']);
$routes->post('chiller/store', [ChillerController::class, 'store']);
$routes->get('chiller/getDataByMonth', 'ChillerController::getDataByMonth');
$routes->get('chiller/getDataByMonth2', 'ChillerController::getDataByMonth2');
$routes->get('chiller/getDataByMonth3', 'ChillerController::getDataByMonth2');
$routes->get('chiller/getChartDataByMonth', 'ChillerController::getChartDataByMonth');
$routes->get('export-chiller1', 'ChillerController::exportToExcel');
$routes->get('export-chiller2', 'ChillerController::exportToExcel2');
$routes->get('export-chiller3', 'ChillerController::exportToExcel3');
$routes->get('lcp', [LcpController::class, 'index']);
$routes->get('lcp/create', [LcpController::class, 'create']);
$routes->post('lcp/store', [LcpController::class, 'store']);
$routes->get('lcp/getDataByMonth', 'LcpController::getDataByMonth');
$routes->get('lcp/getChartDataByMonth', 'LcpController::getChartDataByMonth');
$routes->get('export-lcp', 'LcpController::exportToExcel');
$routes->get('vesda', [VesdaController::class, 'index']);
$routes->get('vesda/create', [VesdaController::class, 'create']);
$routes->post('vesda/store', [VesdaController::class, 'store']);
$routes->get('vesda/getChartDataByMonth', 'VesdaController::getChartDataByMonth');
$routes->get('export-vesda', 'VesdaController::exportToExcel');
$routes->get('tabung', [TabungController::class, 'index']);
$routes->get('tabung/create', [TabungController::class, 'create']);
$routes->post('tabung/store', [TabungController::class, 'store']);
$routes->get('tabung/getChartDataByMonth', 'TabungController::getChartDataByMonth');
$routes->get('export-tabung', 'TabungController::exportToExcel');
$routes->get('fire', [FireController::class, 'index']);
$routes->get('fire/create', [FireController::class, 'create']);
$routes->post('fire/store', [FireController::class, 'store']);
$routes->get('export-fire', 'FireController::exportToExcel');
$routes->get('cctv', [CctvController::class, 'index']);
$routes->get('cctv/create', [CctvController::class, 'create']);
$routes->post('cctv/store', [CctvController::class, 'store']);
$routes->get('export-cctv', 'CctvController::exportToExcel');
$routes->get('cctv/getChartDataByMonth', 'CctvController::getChartDataByMonth');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

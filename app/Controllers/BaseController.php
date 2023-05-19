<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form','All'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->UsersModel = new \App\Models\UsersModel();
        $this->TokensModel = new \App\Models\TokensModel();
        $this->CountriesModel = new \App\Models\CountriesModel();
        $this->SettingsModel = new \App\Models\SettingsModel();
        $this->MethodsModel = new \App\Models\MethodsModel();
        $this->PlansModel = new \App\Models\PlansModel();
        $this->WalletsModel = new \App\Models\WalletsModel();
        $this->EmailsModel = new \App\Models\EmailsModel();
        $this->TransactionsModel = new \App\Models\TransactionsModel();
        $this->DepositsModel = new \App\Models\DepositsModel();
        $this->WithdrawsModel = new \App\Models\WithdrawsModel();
        $this->WhitelistsModel = new \App\Models\WhitelistsModel();
        $this->Email = \Config\Services::email();
    }
}
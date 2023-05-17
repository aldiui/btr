<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->has('role') || !$session->has('id')) {
            return redirect()->to(base_url('/'));
        } 

        $role = $session->get('role');
        $id = $session->get('id');

        $allowedRoles = $arguments;
        if (!in_array($role, $allowedRoles)) {
            if($role == "admin"){
                return redirect()->to(base_url('/admin/dashboard'));
            } elseif ($role == "user") {
                return redirect()->to(base_url('/dashboard'));
            }
        }

        // Simpan email dan jabatan ke dalam variabel view untuk digunakan di dalam view
        $view = \Config\Services::renderer();
        $view->setVar('id', $id);
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
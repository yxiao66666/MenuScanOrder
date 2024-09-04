<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;

class LoginFilter implements FilterInterface
{
    /**
     * Executes before the controller action.
     *
     * This method checks if the user is logged in by verifying session data.
     * If the user is not logged in, it prepares and returns a response indicating
     * that the user is not logged in.
     *
     * @param RequestInterface $request  The current request object
     * @param mixed            $arguments Optional arguments passed to the filter
     *
     * @return \CodeIgniter\HTTP\ResponseInterface|null
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        
        // Check if the user is not logged in
        if (!$session->get('isLoggedIn')) {
            // Prepare a response object to return a message
            $response = Services::response();
            $response->setStatusCode(200); // You can set this to 401 if it's an unauthorized access
            $response->setBody('Not logged In');
            return $response; // Return the response object with the message
        }
    }

    /**
     * Executes after the controller action.
     *
     * This method is a placeholder and currently does not perform any actions.
     *
     * @param RequestInterface  $request  The current request object
     * @param ResponseInterface $response The current response object
     * @param mixed             $arguments Optional arguments passed to the filter
     *
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the controller method is executed
    }
}

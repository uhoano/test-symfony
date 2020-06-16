<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    public function number($id)
    {
        return new Response(
            '<html><body>Lucky number: ' . $id . '</body></html>'
        );
    }

    /**     
     * @Route("/hello")     
     */
    public function hello()
    {
        return new Response(
            "<html><body>Hello</body></html>"
        );
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Request;

class VerifyJack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        //return false;
//        $obj = new \ReflectionClass($request->request);
//        foreach ($obj->getMethods() as $item){
//            echo $item."<br />";
//        }
//        //print_r($request->request->all());

        //echo $request->headers->get('User-Agent');

//        echo $request->query->get("b");
//        echo $request->query->getInt("num",20);
//        echo $request->headers->get("HOST");

//        print_r($request->query);
//        print_r($request->request);
//        print_r($request->headers);

          //print_r($request->server->get("PATH_INFO"));
        //print_r($request->files);
        //print_r($request->cookies);
        //$request->role = "admin";
        //print_r($request->role);
        //print_r($request->getContent());
        //echo $request->getPathInfo();

//        $request = Request::create("/hello-world","GET",['a'=>1,'b'=>2]);
//        print_r($request->query->all());
//        $request->overrideGlobals();


        //echo $request->getSession();
        echo $request->getRequestUri();
        return $next($request);
    }
}

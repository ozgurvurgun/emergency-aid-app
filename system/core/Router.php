<?php
class Router
{
    public static function parse_url()
    {
        $dirname = dirname($_SERVER['SCRIPT_NAME']);
        $dirname = $dirname != '/' ? $dirname : null;
        $basename = basename($_SERVER['SCRIPT_NAME']);
        $request_uri = str_replace([$dirname, $basename], "", $_SERVER['REQUEST_URI']);
        return $request_uri;
    }
    public static function run($url, $callback, $method = 'get')
    {
        $method = explode('|', strtoupper($method));
        if (in_array($_SERVER['REQUEST_METHOD'], $method)) {
            $patterns = [
                '{url}' => '([0-9a-z-A-Z]+)',
                '{id}'    => '([0-9]+)'
            ];
            $url = str_replace(array_keys($patterns), array_values($patterns), $url);
            $request_uri = self::parse_url();
            if (preg_match('@^' .  $url . '$@', $request_uri, $parameters)) {
                unset($parameters[0]);
                if (is_callable($callback)) {
                    call_user_func_array($callback, $parameters);
                } else {
                    $controller = explode('@', $callback);
                    $className = explode('/', $controller[0]);
                    $className = end($className);
                    $controller_files = glob("app/controller/*.php");
                    foreach ($controller_files as $file) {
                        $fileName =  explode("/", $file);
                        if (strtolower($fileName[2]) == strtolower($controller[0] . ".php")) {
                            $controller[0] = $fileName[2];
                            break;
                        }
                    }
                    $controllerFile = 'app/controller/' . $controller[0];
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        $className = 'App\Controller\\' . $className;
                        call_user_func_array([new $className, $controller[1]], $parameters);
                    }
                }
            } else {
                echo '<h1 style="color:Red">404 Page Not Found.</h1>';
            }
        }
    }
}

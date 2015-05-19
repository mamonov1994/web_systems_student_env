<?php   // ----------- Router.php

class Router
{

    private static $routes = array('GET' => array(), 'POST' => array()); //метод работает без экземпляра, массив array позвол.накапливать значения

    public function __constructor()
    {
    } //стандарт.сборка для вызова элемента класса, создает стандарт.класс

    public function get($pattern, $callback) //
    {
        $this->set('GET', $pattern, $callback);
    }

    public function post($pattern, $callback)
    {
        $this->set('POST', $pattern, $callback);
    }

    private function set($type, $pattern, $callback)
    {
        if (!function_exists($callback)) {
            new Exception("Method $callback not exists");
        }
        self::$routes[$type][$pattern] = $callback;
    }


    public function process($method, $uri)
    {
        if (in_array($method, array('GET', 'POST'))) {
            new Exception("Request method should be GET or POST");
        }

// Выполнение роутинга
// Используем роуты $routes['GET'] или $routes['POST']  в зависимости от метода HTTP.
    $active_routes = self::$routes[$method];
// Для всех роутов
        foreach ($active_routes as $pattern => $callback) {

// Если REQUEST_URI соответствует шаблону - вызываем функцию
            if (preg_match_all("/$pattern/", $uri, $matches)) // глобальный поиск шаблона в строке
            {
                var_dump($pattern);
                return call_user_func($callback, $matches[1][0]); //Вызывает пользовательскую функцию, указанную в первом параметре
            }
            $matches = array();
        }
        return "";
    }
}
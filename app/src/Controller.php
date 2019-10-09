<?php

namespace SON;

class Controller
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function render(array $data = [], string $view = null)
    {
        if (!$view) {
            $view = $this->controllerName() . '/' . debug_backtrace()[1]['function'];
        }
        extract($data);
        require __DIR__ . '/templates/' . $view . '.tpl.php';
    }

    private function controllerName()
    {
        $class = get_class($this);
        $class = explode('\\', $class);
        $class = array_pop($class);
        $class = preg_replace('/Controller$/', '', $class);
        return strtolower($class);
    }

    private function configModel()
    {
        if (!$this->model->getTableName()) {
            $this->model->setTableName($this->controllerName());
        }
    }
}

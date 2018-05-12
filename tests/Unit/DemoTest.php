<?php

namespace Alive2212\LaravelSmartMeta\Unit;

use Alive2212\LaravelSmartMeta\SmartMeta;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    /**
     * @var string
     */
    private $PACKAGE_NAME = "LaravelSmartMeta";

    /**
     * @var array
     */
    private $PACKAGE_CLASSES = [
        "SmartMeta",
    ];

    protected $app;

    public function __construct()
    {
        parent::__construct();
        $this->createApplication();
    }

    public function createApplication()
    {
        $app = new Container();
        $app->bind('app', 'Illuminate\Container\Container');

        foreach ($this->PACKAGE_CLASSES as $PACKAGE_CLASS) {
            $app->bind($PACKAGE_CLASS, 'Alive2212\\'.$this->PACKAGE_NAME.'\\'.$PACKAGE_CLASS);
        }

        $this->app = $app;
        Facade::setFacadeApplication($app);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // create String Helper
//        $smartMeta = $this->app->make($this->PACKAGE_CLASSES);

        $model = new class extends Model{
            use SmartMeta;
        };

        $model->setId(1);
        $model->setGlobalKey('test'.'_'.$model->getId());
        $model->initCache();
        $this->assertTrue($model->getId() == 1);

//        $this->assertTrue($model->initCache()->getId() == 1);


        $this->assertTrue(true);
    }
}

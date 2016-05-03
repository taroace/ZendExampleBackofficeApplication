<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Formulaire_User for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Formulaire_UserTest\Framework;

use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{

    public static $locator;

    public static function setLocator ($locator)
    {
        self::$locator = $locator;
    }

    public function getLocator ()
    {
        return self::$locator;
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 30.01.2017
 * Time: 16:17
 */

namespace AppBundle\DataFixtures\ORM;

use Faker\Provider\Base as Base;

class AttributeProvider extends Base
{

    const ATTRIBUTE_GROUPS = [
        'Цвет',
        'Объем встроенной памяти',
        'Объем оперативной памяти',
        'Вес',
    ];

    const COLOR_PROVIDER = [
        'Красный',
        'Черный',
        'Белый',
        'Синий',
    ];

    const ROM_PROVIDER = [
        '16',
        '32',
        '64',
    ];

    const RAM_PROVIDER = [
        '1',
        '2',
        '3',
        '4',
    ];

    const WEIGHT_PROVIDER = [
        '200',
        '300',
        '400',
        '500',
    ];

    public static function attribute_group() {
        return Base::randomElement(self::ATTRIBUTE_GROUPS);
    }

    public static function attribute_value($group) {

        switch ($group) {
            case 'Цвет':
                return Base::randomElement(self::COLOR_PROVIDER);
                break;
            case 'Объем встроенной памяти':
                return Base::randomElement(self::ROM_PROVIDER);
                break;
            case 'Объем оперативной памяти':
                return Base::randomElement(self::RAM_PROVIDER);
                break;
            case 'Вес':
                return Base::randomElement(self::WEIGHT_PROVIDER);
                break;
        }

    }

    public static function attribute_metric($group) {

        switch ($group) {
            case 'Цвет':
                return null;
                break;
            case 'Объем встроенной памяти':
                return 'GB';
                break;
            case 'Объем оперативной памяти':
                return 'GB';
                break;
            case 'Вес':
                return 'гр';
                break;
        }

    }

}
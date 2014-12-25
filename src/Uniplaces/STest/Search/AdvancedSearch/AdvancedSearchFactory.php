<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 18:07
 */

namespace Uniplaces\STest\Search\AdvancedSearch;

class AdvancedSearchFactory {

    public static function createAddress()
    {
        return new AddressSearch();
    }


    public static function createPrice()
    {
        return new PriceSearch();
    }

}
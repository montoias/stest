<?php

namespace Uniplaces\STest;
use Uniplaces\STest\Search\SearchProperties;

/**
 * ListingFinderFactory
 */
abstract class ListingFinderFactory
{
    /**
     * @return ListingFinderInterface
     */
    public static function createSimple()
    {
        return new ListingFinder(SearchProperties::SIMPLE);
    }

    /**
     * @return ListingFinderInterface
     */
    public static function createAdvanced()
    {
        return new ListingFinder(SearchProperties::ADVANCED);
    }
}

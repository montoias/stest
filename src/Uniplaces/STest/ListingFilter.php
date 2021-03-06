<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 04:41
 */

namespace Uniplaces\STest;

use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use Uniplaces\STest\Search\SearchProperties;


class ListingFilter {

    /***
     * Validate if the listing passes the criteria
     *
     * @param $listing
     * @param $search
     * @return bool
     */
    public static function isCriteriaMatched($listing, $search){
        return !(ListingFilter::validCity($listing, $search) ||
                    ListingFilter::validStayTime($listing, $search) ||
                    ListingFilter::validTenant($listing,$search));
    }

    public static function validCity($listing, $search){
        return $listing->getLocalization()->getCity() != $search['city'];
    }

    public static function validStayTime($listing, $search){
        $stayTime = $listing->getRequirements()->getStayTime();
        if (isset($search[SearchProperties::START_DATE]) && $stayTime instanceof StayTime) {
            /** @var DateTime $startDate */
            $startDate = $search[SearchProperties::START_DATE];
            /** @var DateTime $endDate */
            $endDate = $search[SearchProperties::END_DATE];

            $interval = $endDate->diff($startDate);
            $days = (int)$interval->format('%a');

            return $days < $stayTime->getMin() || $days > $stayTime->getMax();
        }
        return false;
    }

    public static function validTenant($listing, $search){
        $tenantTypes = $listing->getRequirements()->getTenantTypes();
        return $tenantTypes instanceof TenantTypes && !in_array($search[SearchProperties::OCCUPATION], $tenantTypes->toArray());
    }

}
<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace CoreShop\Component\Shipping\Validator;

use CoreShop\Component\Address\Model\AddressInterface;
use CoreShop\Component\Shipping\Checker\CarrierShippingRuleCheckerInterface;
use CoreShop\Component\Shipping\Model\CarrierInterface;
use CoreShop\Component\Shipping\Model\ShippableInterface;

class ShippingRuleCarrierValidator implements ShippableCarrierValidatorInterface
{
    public function __construct(private CarrierShippingRuleCheckerInterface $carrierShippingRuleChecker)
    {
    }

    public function isCarrierValid(CarrierInterface $carrier, ShippableInterface $shippable, AddressInterface $address): bool
    {
        if (0 === count($carrier->getShippingRules())) {
            return true;
        }

        return null !== $this->carrierShippingRuleChecker->findValidShippingRule($carrier, $shippable, $address);
    }
}

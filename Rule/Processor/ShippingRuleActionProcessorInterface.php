<?php
declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Component\Shipping\Rule\Processor;

use CoreShop\Component\Address\Model\AddressInterface;
use CoreShop\Component\Shipping\Model\CarrierInterface;
use CoreShop\Component\Shipping\Model\ShippableInterface;
use CoreShop\Component\Shipping\Model\ShippingRuleInterface;

interface ShippingRuleActionProcessorInterface
{
    public function getPrice(ShippingRuleInterface $shippingRule, CarrierInterface $carrier, ShippableInterface $shippable, AddressInterface $address, array $context): int;

    public function getModification(ShippingRuleInterface $shippingRule, CarrierInterface $carrier, ShippableInterface $shippable, AddressInterface $address, int $price, array $context): int;
}

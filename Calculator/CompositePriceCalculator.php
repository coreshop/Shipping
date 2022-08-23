<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 */

declare(strict_types=1);

namespace CoreShop\Component\Shipping\Calculator;

use CoreShop\Component\Address\Model\AddressInterface;
use CoreShop\Component\Shipping\Exception\NoShippingPriceFoundException;
use CoreShop\Component\Shipping\Model\CarrierInterface;
use CoreShop\Component\Shipping\Model\ShippableInterface;

class CompositePriceCalculator implements CarrierPriceCalculatorInterface
{
    public function __construct(protected array $calculators)
    {
    }

    public function getPrice(CarrierInterface $carrier, ShippableInterface $shippable, AddressInterface $address, array $context): int
    {
        $price = 0;

        foreach ($this->calculators as $calculator) {
            try {
                $price = $calculator->getPrice($carrier, $shippable, $address, $context);
            } catch (NoShippingPriceFoundException) {
                continue;
            }
        }

        return $price;
    }
}

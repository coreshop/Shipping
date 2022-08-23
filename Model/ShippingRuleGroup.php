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

namespace CoreShop\Component\Shipping\Model;

use CoreShop\Component\Resource\Model\SetValuesTrait;
use CoreShop\Component\Resource\Model\TimestampableTrait;

/**
 * @psalm-suppress MissingConstructor
 */
class ShippingRuleGroup implements ShippingRuleGroupInterface
{
    use TimestampableTrait;

    use SetValuesTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var CarrierInterface
     */
    private $carrier;

    /**
     * @var int
     */
    private $priority;

    /**
     * @var bool
     */
    private $stopPropagation = false;

    /**
     * @var ShippingRuleInterface
     */
    private $shippingRule;

    public function getId()
    {
        return $this->id;
    }

    public function getCarrier()
    {
        return $this->carrier;
    }

    public function setCarrier(CarrierInterface $carrier = null)
    {
        $this->carrier = $carrier;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getStopPropagation()
    {
        return $this->stopPropagation;
    }

    public function setStopPropagation($stopPropagation)
    {
        $this->stopPropagation = $stopPropagation;
    }

    public function getShippingRule()
    {
        return $this->shippingRule;
    }

    public function setShippingRule(ShippingRuleInterface $shippingRule)
    {
        $this->shippingRule = $shippingRule;
    }
}

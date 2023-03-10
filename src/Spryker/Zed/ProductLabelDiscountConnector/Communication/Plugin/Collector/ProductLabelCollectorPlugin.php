<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\Collector;

use Generated\Shared\Transfer\ClauseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Discount\Business\QueryString\ComparatorOperators;
use Spryker\Zed\Discount\Dependency\Plugin\CollectorPluginInterface;
use Spryker\Zed\Discount\Dependency\Plugin\DiscountRuleWithValueOptionsPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @deprecated Use {@link \Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\Discount\ProductLabelDiscountableItemCollectorPlugin} instead.
 *
 * @method \Spryker\Zed\ProductLabelDiscountConnector\Business\ProductLabelDiscountConnectorFacadeInterface getFacade()
 * @method \Spryker\Zed\ProductLabelDiscountConnector\ProductLabelDiscountConnectorConfig getConfig()
 */
class ProductLabelCollectorPlugin extends AbstractPlugin implements CollectorPluginInterface, DiscountRuleWithValueOptionsPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\ClauseTransfer $clauseTransfer
     *
     * @return array<\Generated\Shared\Transfer\DiscountableItemTransfer>
     */
    public function collect(QuoteTransfer $quoteTransfer, ClauseTransfer $clauseTransfer)
    {
        return $this->getFacade()->collectByProductLabel($quoteTransfer, $clauseTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getFieldName()
    {
        return 'product-label';
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array
     */
    public function acceptedDataTypes()
    {
        return [
            ComparatorOperators::TYPE_STRING,
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array<string>
     */
    public function getQueryStringValueOptions()
    {
        return $this->getFacade()->findAllLabels();
    }
}

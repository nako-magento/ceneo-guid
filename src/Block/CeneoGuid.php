<?php

namespace Nako\CeneoGuid\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class CeneoGuid
 * @package Nako\CeneoGuid\Block
 */
class CeneoGuid extends Template
{

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Nako\CeneoGuid\Helper\Data
     */
    protected $helper;

    /**
     * CeneoGuid constructor.
     * @param Template\Context $context
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Nako\CeneoGuid\Helper\Data $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Nako\CeneoGuid\Helper\Data $helper,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->checkoutSession = $checkoutSession;
        $this->helper = $helper;
    }

    /**
     * @return string
     */
    public function getCeneoGuidKey()
    {
        return $this->helper->getCeneoGuidKey();
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->checkoutSession->getLastRealOrder()->getRealOrderId();
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->checkoutSession->getLastRealOrder()->getCustomerEmail();
    }

    /**
     * @return string
     */
    public function getCeneoItemsSku()
    {
        $items = $this->checkoutSession->getLastRealOrder()->getAllItems();
        $ceneoProductSku = '';
        foreach ($items as $item) {
            $ceneoProductSku .= '#' . $item->getSku();
        }
        $ceneoProductSku .= '#';

        return $ceneoProductSku;
    }

    /**
     * @return mixed
     */
    public function isModuleEnabled()
    {
        return $this->helper->isModuleEnable();
    }

    /**
     * @return mixed
     */
    public function getCeneoWorkDaysToSendQuestionnaire()
    {
        return $this->helper->getCeneoWorkDaysToSendQuestionnaire();
    }
}

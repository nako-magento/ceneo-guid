<?php

namespace Nako\CeneoGuid\Helper;

/**
 * Class Data
 * @package Nako\CeneoGuid\Helper
 */
class Data
{
    /** @var string XML PATH CENEO GUID KEY */
    const CENEO_GUID_KEY_PATH = 'nako_ceneoguid/general/key';

    /** @var string XML PATH MODULE ENABLED */
    const MODULE_ENABLE_PATH = 'nako_ceneoguid/general/enable';

    /** @var string XML PATH WORKDAYS TO SEND QUESTIONNAIRE */
    const WORKDAYS_TO_SEND_QUESTIONNAIRE_PATH = 'nako_ceneoguid/general/workdays_to_send_questionnaire';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return mixed
     */
    public function getCeneoGuidKey()
    {
        return $this->scopeConfig->getValue(
            self::CENEO_GUID_KEY_PATH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function isModuleEnable()
    {
        return $this->scopeConfig->getValue(
            self::MODULE_ENABLE_PATH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getCeneoWorkDaysToSendQuestionnaire()
    {
        return $this->scopeConfig->getValue(
            self::WORKDAYS_TO_SEND_QUESTIONNAIRE_PATH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}

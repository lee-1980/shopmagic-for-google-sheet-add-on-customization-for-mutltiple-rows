<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace ShopMagicGoogleSheetsVendor\Google\Service\Sheets;

class PivotGroupRule extends \ShopMagicGoogleSheetsVendor\Google\Model
{
    protected $dateTimeRuleType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DateTimeRule::class;
    protected $dateTimeRuleDataType = '';
    protected $histogramRuleType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\HistogramRule::class;
    protected $histogramRuleDataType = '';
    protected $manualRuleType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ManualRule::class;
    protected $manualRuleDataType = '';
    /**
     * @param DateTimeRule
     */
    public function setDateTimeRule(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DateTimeRule $dateTimeRule)
    {
        $this->dateTimeRule = $dateTimeRule;
    }
    /**
     * @return DateTimeRule
     */
    public function getDateTimeRule()
    {
        return $this->dateTimeRule;
    }
    /**
     * @param HistogramRule
     */
    public function setHistogramRule(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\HistogramRule $histogramRule)
    {
        $this->histogramRule = $histogramRule;
    }
    /**
     * @return HistogramRule
     */
    public function getHistogramRule()
    {
        return $this->histogramRule;
    }
    /**
     * @param ManualRule
     */
    public function setManualRule(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ManualRule $manualRule)
    {
        $this->manualRule = $manualRule;
    }
    /**
     * @return ManualRule
     */
    public function getManualRule()
    {
        return $this->manualRule;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\PivotGroupRule::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_PivotGroupRule');
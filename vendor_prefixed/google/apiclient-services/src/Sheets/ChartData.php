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

class ChartData extends \ShopMagicGoogleSheetsVendor\Google\Model
{
    /**
     * @var string
     */
    public $aggregateType;
    protected $columnReferenceType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DataSourceColumnReference::class;
    protected $columnReferenceDataType = '';
    protected $groupRuleType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ChartGroupRule::class;
    protected $groupRuleDataType = '';
    protected $sourceRangeType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ChartSourceRange::class;
    protected $sourceRangeDataType = '';
    /**
     * @param string
     */
    public function setAggregateType($aggregateType)
    {
        $this->aggregateType = $aggregateType;
    }
    /**
     * @return string
     */
    public function getAggregateType()
    {
        return $this->aggregateType;
    }
    /**
     * @param DataSourceColumnReference
     */
    public function setColumnReference(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DataSourceColumnReference $columnReference)
    {
        $this->columnReference = $columnReference;
    }
    /**
     * @return DataSourceColumnReference
     */
    public function getColumnReference()
    {
        return $this->columnReference;
    }
    /**
     * @param ChartGroupRule
     */
    public function setGroupRule(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ChartGroupRule $groupRule)
    {
        $this->groupRule = $groupRule;
    }
    /**
     * @return ChartGroupRule
     */
    public function getGroupRule()
    {
        return $this->groupRule;
    }
    /**
     * @param ChartSourceRange
     */
    public function setSourceRange(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ChartSourceRange $sourceRange)
    {
        $this->sourceRange = $sourceRange;
    }
    /**
     * @return ChartSourceRange
     */
    public function getSourceRange()
    {
        return $this->sourceRange;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\ChartData::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_ChartData');
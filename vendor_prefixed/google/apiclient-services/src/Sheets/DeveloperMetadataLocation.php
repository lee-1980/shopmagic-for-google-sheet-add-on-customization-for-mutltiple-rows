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

class DeveloperMetadataLocation extends \ShopMagicGoogleSheetsVendor\Google\Model
{
    protected $dimensionRangeType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DimensionRange::class;
    protected $dimensionRangeDataType = '';
    /**
     * @var string
     */
    public $locationType;
    /**
     * @var int
     */
    public $sheetId;
    /**
     * @var bool
     */
    public $spreadsheet;
    /**
     * @param DimensionRange
     */
    public function setDimensionRange(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DimensionRange $dimensionRange)
    {
        $this->dimensionRange = $dimensionRange;
    }
    /**
     * @return DimensionRange
     */
    public function getDimensionRange()
    {
        return $this->dimensionRange;
    }
    /**
     * @param string
     */
    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;
    }
    /**
     * @return string
     */
    public function getLocationType()
    {
        return $this->locationType;
    }
    /**
     * @param int
     */
    public function setSheetId($sheetId)
    {
        $this->sheetId = $sheetId;
    }
    /**
     * @return int
     */
    public function getSheetId()
    {
        return $this->sheetId;
    }
    /**
     * @param bool
     */
    public function setSpreadsheet($spreadsheet)
    {
        $this->spreadsheet = $spreadsheet;
    }
    /**
     * @return bool
     */
    public function getSpreadsheet()
    {
        return $this->spreadsheet;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DeveloperMetadataLocation::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_DeveloperMetadataLocation');

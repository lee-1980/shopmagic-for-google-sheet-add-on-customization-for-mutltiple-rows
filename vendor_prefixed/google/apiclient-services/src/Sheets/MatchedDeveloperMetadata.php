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

class MatchedDeveloperMetadata extends \ShopMagicGoogleSheetsVendor\Google\Collection
{
    protected $collection_key = 'dataFilters';
    protected $dataFiltersType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DataFilter::class;
    protected $dataFiltersDataType = 'array';
    protected $developerMetadataType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DeveloperMetadata::class;
    protected $developerMetadataDataType = '';
    /**
     * @param DataFilter[]
     */
    public function setDataFilters($dataFilters)
    {
        $this->dataFilters = $dataFilters;
    }
    /**
     * @return DataFilter[]
     */
    public function getDataFilters()
    {
        return $this->dataFilters;
    }
    /**
     * @param DeveloperMetadata
     */
    public function setDeveloperMetadata(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DeveloperMetadata $developerMetadata)
    {
        $this->developerMetadata = $developerMetadata;
    }
    /**
     * @return DeveloperMetadata
     */
    public function getDeveloperMetadata()
    {
        return $this->developerMetadata;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\MatchedDeveloperMetadata::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_MatchedDeveloperMetadata');

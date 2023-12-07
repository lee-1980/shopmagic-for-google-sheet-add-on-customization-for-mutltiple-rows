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

class AddDataSourceRequest extends \ShopMagicGoogleSheetsVendor\Google\Model
{
    protected $dataSourceType = \ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DataSource::class;
    protected $dataSourceDataType = '';
    /**
     * @param DataSource
     */
    public function setDataSource(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }
    /**
     * @return DataSource
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\AddDataSourceRequest::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_AddDataSourceRequest');

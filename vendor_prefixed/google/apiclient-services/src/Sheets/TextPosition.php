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

class TextPosition extends \ShopMagicGoogleSheetsVendor\Google\Model
{
    /**
     * @var string
     */
    public $horizontalAlignment;
    /**
     * @param string
     */
    public function setHorizontalAlignment($horizontalAlignment)
    {
        $this->horizontalAlignment = $horizontalAlignment;
    }
    /**
     * @return string
     */
    public function getHorizontalAlignment()
    {
        return $this->horizontalAlignment;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Sheets\TextPosition::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Sheets_TextPosition');
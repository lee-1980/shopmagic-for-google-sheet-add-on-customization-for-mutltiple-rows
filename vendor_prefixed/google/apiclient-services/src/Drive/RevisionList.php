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
namespace ShopMagicGoogleSheetsVendor\Google\Service\Drive;

class RevisionList extends \ShopMagicGoogleSheetsVendor\Google\Collection
{
    protected $collection_key = 'revisions';
    /**
     * @var string
     */
    public $kind;
    /**
     * @var string
     */
    public $nextPageToken;
    protected $revisionsType = \ShopMagicGoogleSheetsVendor\Google\Service\Drive\Revision::class;
    protected $revisionsDataType = 'array';
    /**
     * @param string
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }
    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }
    /**
     * @param string
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }
    /**
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
    /**
     * @param Revision[]
     */
    public function setRevisions($revisions)
    {
        $this->revisions = $revisions;
    }
    /**
     * @return Revision[]
     */
    public function getRevisions()
    {
        return $this->revisions;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ShopMagicGoogleSheetsVendor\Google\Service\Drive\RevisionList::class, 'ShopMagicGoogleSheetsVendor\\Google_Service_Drive_RevisionList');

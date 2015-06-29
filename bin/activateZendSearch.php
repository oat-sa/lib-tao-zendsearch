<?php
/**  
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * Copyright (c) 2014 (original work) Open Assessment Technologies SA (under the project TAO-PRODUCT);
 *               
 * 
 */
use oat\tao\model\search\SearchService;
use oat\tao\zendsearch\ZendSearch;

$parms = $argv;
array_shift($parms);

if (count($parms) != 1) {
	echo 'Usage: '.__FILE__.' TAOROOT'.PHP_EOL;
	die(1);
}

$root = rtrim(array_shift($parms), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
$rawStart = $root.'tao'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'raw_start.php';

if (!file_exists($rawStart)) {
    echo 'Tao not found at "'.$rawStart.'"'.PHP_EOL;
    die(1);
}

require_once $rawStart;

if (!class_exists('oat\\tao\\zendsearch\\ZendSearch')) {
    echo 'Tao Zend Search not found'.PHP_EOL;
    die(1);
}

$impl = ZendSearch::createSearch();
SearchService::setSearchImplementation($impl);

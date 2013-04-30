<?php

/*
 * This file is part of the JsonSchema package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JsonSchema\Tests\Constraints;

class UniqueItemsTest extends BaseTestCase
{
    public function getInvalidTests()
    {
        return array(
            array(
                '[1,2,2]',
                '{
                  "type":"array",
                  "uniqueItems": true
                }'
            ),
            array(
                '[{"a":"b"},{"a":"c"},{"a":"b"}]',
                '{
                  "type":"array",
                  "uniqueItems": true
                }'
            ),
            array(
                '[{"foo": {"bar" : {"baz" : true}}}, {"foo": {"bar" : {"baz" : true}}}]',
                '{
                    "type": "array",
                    "uniqueItems": true
                }'
            )
        );
    }

    public function getValidTests()
    {
        return array(
            array(
                '[1,2,3]',
                '{
                  "type":"array",
                  "uniqueItems": true
                }'
            ),
            array(
                '[{"foo": 12}, {"bar": false}]',
                '{
                    "type": "array",
                    "uniqueItems": true
                }'
            )
        );
    }
}

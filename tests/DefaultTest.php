<?php

namespace Laragrad\Support\StrTrgm\Tests;

use Laragrad\Support\StrTrgm;
use PHPUnit\Framework\TestCase;

class DefaultTest extends TestCase
{

    /**
     * A basic tests example.
     *
     * @return void
     */
    public function test_similarity()
    {
        $data = [
            [
                'str1' => 'Test equal strings',
                'str2' => 'Test equal strings',
                'result' => 1.0
            ],
            [
                'str1' => 'Test equal strings with mixed words',
                'str2' => 'Mixed words equal test STRINGS with',
                'result' => 1.0
            ],
            [
                'str1' => 'Test different separators',
                'str2' => "Test  separators   ('`!?:;,._+-#$%^&*(){}[]<>\\/\") different",
                'result' => 1.0
            ],
            [
                'str1' => 'Test not equal strings',
                'str2' => 'Testing different strings',
                'result' => 0.333333
            ],
            [
                'str1' => 'Test similar strings red cat',
                'str2' => 'Test similar strings red hat',
                'result' => 0.806452
            ],
            [
                'str1' => '12345678901234567890',
                'str2' => '12345678910234567890',
                'result' => 0.647059
            ],
            [
                'str1' => 'abcd efgh ijkl mnop qrst uvwx yz',
                'str2' => 'z abcd efgh ijkl mnop qrst uvwx y',
                'result' => 0.861111
            ]
        ];

        foreach ($data as $item) {
            $this->assertTrue(
                StrTrgm::similarity($item['str1'], $item['str2']) == $item['result']
            );
        }

    }
}

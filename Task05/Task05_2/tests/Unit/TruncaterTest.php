<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Тазин Александр Николаевич';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Тазин Александр...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 15]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Тазин Александр***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 15, 'separator' => '***']));

        $expected = "Тазин Александр...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -11]));

        $truncater2 = new Truncater(['length' => 15, 'separator' => '!!!']);

        $expected = "Тазин Александр!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\VacancyLevel;

class VacancyLevelTest extends TestCase
{
/**
* @param int $remainingCount
* @param string $expectedMark
* @dataProvider dataMark
*/
    public function testMark(int $remainingCount, string $expectedMark)
    //testMark関数（入力されたモノを変換する役割）でinteger(整数)の$remainingCountとstring(文字列)の$expectedMarkを受け取っている
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedMark, $level->mark());
        //変数$levelにVacancyLevelクラス（設計図）からモノ（インスタンス）を生成している。（引数は整数が入る$remainingCount）
        //assertSameとはある値が期待した値と等しいかどうか調べるメソッド（関数）
    }
    public function dataMark()
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedMark' => '×',
            ],
            '残りわずか' => [
                'remainingCount' => 4,
                'expectedMark' => '△',
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedMark' => '◎',
            ],
        ];
    }
}

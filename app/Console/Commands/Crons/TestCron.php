<?php
/**
 * Created by PhpStorm.
 * User: dj
 * Date: 2019-06-26
 * Time: 15:47
 */
namespace App\Console\Commands\Crons;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCron extends Command
{
    protected $signature = 'testcron:dj';

    protected $description = '测试脚本';

    public function handle()
    {
        $this->info('测试开始:'.date('Y-m-d H:i:s'));
        Log::info('测试脚本=>php是世界上最好的语言.测试时间:'.date('Y-m-d'));
        $this->info('测试结束:'.date('Y-m-d H:i:s'));
    }
}
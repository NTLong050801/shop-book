<?php

namespace Botble\RequestLog\Commands;

use Botble\RequestLog\Models\RequestLog;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand('cms:request-logs:clear', 'Clear all request error logs')]
class RequestLogClearCommand extends Command
{
    public function handle(): int
    {
        $this->components->info('Processing...');

        $count = RequestLog::query()->count();

        RequestLog::query()->truncate();

        $this->components->info(sprintf('Done. Deleted %s records!', number_format($count)));

        return self::SUCCESS;
    }
}

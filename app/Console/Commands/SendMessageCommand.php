<?php

namespace App\Console\Commands;

use App\Services\Whatsapp\WhatsappService;
use Illuminate\Console\Command;

class SendMessageCommand extends Command
{
    protected $signature = 'send:message {--to= : The phone number to send the message to} {--text= : The message to send}';

    protected $description = 'Send a message via WhatsApp using the configured gateway.';

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function handle(WhatsappService $service): void
    {
        $text = $this->option('text');
        $to = $this->option('to');

        $messageId = $service->message()
            ->to($to)
            ->text($text)
            ->send();

        $this->info('Message sent successfully.');
        $this->table(['Message ID', 'Message', 'To'], [[$messageId, $text, $to]]);
    }
}

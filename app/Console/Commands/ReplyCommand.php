<?php

namespace App\Console\Commands;

use App\Services\Whatsapp\Senders\Messages\Models\Reply;
use Illuminate\Console\Command;

class ReplyCommand extends Command
{
    protected $signature = 'message:reply {--message-id= : The ID of the message to reply to} {--to= : The phone number to send the message to} {--text= : The reply message text}';

    protected $description = 'Send a message via WhatsApp using the configured gateway.';

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function handle(): void
    {
        $messageId = $this->option('message-id');
        $to = $this->option('to');
        $text = $this->option('text');

        $reply = Reply::to($to, $text, $messageId);

        $this->info("Message replied to \"$reply->replyToId\" successfully.");
        $this->newLine();
        $this->table(['Message ID', 'Message', 'To'], [[$reply->id, $reply->text, $reply->to]]);
    }
}

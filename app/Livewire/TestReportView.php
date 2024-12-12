<?php

namespace App\Livewire;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.backend')]
class TestReportView extends Component
{
    public $message;
    public $received_name;
    public $received_message;
    public $search;

    #[On('fcm-token')]
    public function receiveFcmToken($token)
    {
        // Get Firebase Messaging instance from the container
        $messaging = app('firebase.messaging');
        $topic = 'test_topic_' . auth()->id();

        // Subscribe the token to the topic
        try {
            $messaging->subscribeToTopic($topic, $token);
            logger("Token {$token} subscribed to topic {$topic}");
        } catch (\Throwable $e) {
            logger("Failed to subscribe token to topic: " . $e->getMessage());
        }
    }

    #[On('receivedMsg')]
    public function receivedMsg($payload)
    {
        $this->received_name = $payload['notification']['title'];
        $this->received_message = $payload['notification']['body'];
    }

    public function sendMessage()
    {
        $messaging = app('firebase.messaging');

        $message = CloudMessage::withTarget('topic', 'test_topic_' . (auth()->id() == 1 ? 1002 : 1))
            ->withNotification(Notification::create(auth()->user()->name, $this->message));

        // Send the message to the topic
        $messaging->send($message);

        $this->reset('message');

    }

    public function render()
    {
        return view('livewire.test-report-view');
    }
}

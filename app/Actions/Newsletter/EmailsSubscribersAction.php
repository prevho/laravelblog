<?php

namespace App\Actions\Newsletter;

use App\Models\Subscriber;

class EmailsSubscribersAction {

    public function __invoke(array $formData) {
        $this->getOrCreateSubscriberEmail($formData);
    }

    private function getOrCreateSubscriberEmail(array $formData):Subscriber {
        return Subscriber::firstOrCreate($formData);
    }
}
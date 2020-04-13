<?php

namespace Faithgen\Miscellaneous\Models;

use FaithGen\SDK\Models\UuidModel;
use Illuminate\Notifications\Notifiable;

class Subscription extends UuidModel
{
    use Notifiable;

    protected $table = 'fg_subscriptions';
}

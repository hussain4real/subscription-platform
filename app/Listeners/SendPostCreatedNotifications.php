<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\Post;
use App\Notifications\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        $posts = $event->post;
        $website = $posts->website()->with('subscriptions')->first();

        //send notification to subscribers who have not received notification yet
        $website->subscriptions->each(function ($subscription) use ($posts) {
            if ($subscription->last_seen_post_id !== $posts->id) {
                $subscription->user->notify(new NewPost($posts));
                $subscription->update(['last_seen_post_id' => $posts->id]);
                $subscription->save();
            }
        });


    }
}
//
//foreach ($posts as $post) {
//    foreach ($post->website->subscriptions as $subscription) {
//        $subscription->user->notify(new NewPost($post));
//    }
//}

<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);

        if(!$topic->slug){
            //$topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
            //向列队里添加任务
            //dispatch(new TranslateSlug($topic));
        }
    }
}
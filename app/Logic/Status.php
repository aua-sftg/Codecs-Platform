<?php

namespace App\Logic;

class Status
{


    const STATUS_PUBLISHED = 'published';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_DRAFT = 'draft';

    const STATUS_LABELS_ARRAY = [
        self::STATUS_PUBLISHED => 'Published',
        self::STATUS_UNPUBLISHED => 'Unpublished',
        self::STATUS_DRAFT => 'Draft',
    ];


}

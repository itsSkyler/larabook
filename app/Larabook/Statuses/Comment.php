<?php namespace Larabook\Statuses;

use Eloquent;

/**
 * Class Comment
 * @package Larabook\Statuses
 */
class Comment extends Eloquent {

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'status_comments';

    /**
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

    /**
     * Leave a comment on a status
     *
     * @param $body
     * @param $statusId
     * @return static
     */
    public static function leave($body, $statusId)
    {
        return new static([
            'body' => $body,
            'status_id' => $statusId
        ]);
    }
}
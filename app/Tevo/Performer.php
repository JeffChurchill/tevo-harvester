<?php namespace App\Tevo;

use Carbon\Carbon;

class Performer extends Model
{
    use StoresFromApi;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'performers';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 100;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'popularity_score',
        'venue_id',
        'keywords',
        'upcoming_event_first',
        'upcoming_event_last',
        'url',
        'slug_url',
        'tevo_created_at',
        'tevo_updated_at',
        'tevo_deleted_at',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'upcoming_event_first',
        'upcoming_event_last',
        'tevo_created_at',
        'tevo_updated_at',
        'tevo_deleted_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that may be NULL.
     *
     * @var array
     */
    protected $nullable = [
        'keywords',
        'category_id',
        'upcoming_event_first',
        'upcoming_event_last',
    ];


    /**
     * Mutate the $result as necessary.
     * Be sure to run the parent::mutateApiResult() to get the common mutations.
     *
     * @param array $result
     *
     * @return array
     */
    protected static function mutateApiResult(array $result): array
    {
        // Be sure to call the parent version for common mutations
        $result = parent::mutateApiResult($result);


        /**
         * Add custom mutations for this item type here
         */
        $result['category_id'] = $result['category']['id'] ?? null;
        unset($result['category']);

        $result['venue_id'] = $result['venue']['id'] ?? null;
        unset($result['venue']);

        $result['upcoming_event_first'] = Carbon::parse($result['upcoming_events']['first']) ?? null;
        $result['upcoming_event_last'] = Carbon::parse($result['upcoming_events']['last']) ?? null;
        unset($result['upcoming_events']);

        return $result;
    }


    /**
     * Performers can have only 1 Category.
     *
     * @return array
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }


    /**
     * Performers may have 0 or 1 Venues.
     *
     * @return array
     */
    public function venue()
    {
        return $this->hasOne(Venue::class);
    }


    /**
     * Performers can have more than 1 Event.
     *
     * @return array
     */
    public function events()
    {
        return $this->hasManyThrough(Performance::class, Event::class);
    }


    /**
     * Performers belong to a Performance.
     *
     * @return array
     */
    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }


    /**
     * Mutator to nullify empty value.
     *
     * @return array
     */
    public function setKeywordsAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['keywords'] = null;
        } else {
            $this->attributes['keywords'] = $value;
        }
    }
}

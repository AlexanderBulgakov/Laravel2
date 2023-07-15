<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, Sluggable, SluggableScopeHelpers, InteractsWithMedia;

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISH = 'publish';

    protected $fillable = [
        'status',
        'title',
        'category_id',
        'description',
        'body',
        'user_id',
    ];

    protected $with = [
        'category',
        'user',
    ];

    /**
     * Get all statuses.
     *
     * @return array
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_PUBLISH => 'Publish',
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    => 'title',
                'onUpdate'  => true,
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Add image collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('blog-images')
            ->withResponsiveImages()
            ->singleFile();
    }

    /**
     * Create thumbnails.
     *
     * @return void
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('blog-preview')
            ->fit(Manipulations::FIT_CROP, 456, 176);

        $this
            ->addMediaConversion('blog-thumbnail')
            ->fit(Manipulations::FIT_CROP, 150, 150);
    }

    /**
     * Relationship. Get user for the post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'display_name' => '---',
            'id' => 0,
        ]);
    }

    /**
     * Relationship. Get category for the post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'title' => '---',
            'id' => 0,
        ]);
    }

    /**
     * Relationship. Get post tags
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}

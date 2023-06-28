<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Support\Str;
    
    class Post extends Model
    {
        
        use HasFactory;
        
        protected $guarded = [];
        
        public function scopePublished($query): void
        {
            $query->where('is_published', true);
        }
        
        public function setSlugAttribute($value): void
        {
            $this->attributes['slug'] = Str::slug($value, '-');
        }
        
        public function author(): BelongsTo
        {
            return $this->belongsTo(User::class, 'author_id');
        }
        
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
        
    }
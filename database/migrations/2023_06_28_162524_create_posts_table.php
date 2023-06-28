<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('category_id')->constrained('categories');
                $table->string('title');
                $table->mediumText('body');
                $table->string('slug')->nullable();
                $table->boolean('is_published')->default(false);
                $table->timestamps();
            });
        }
        
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('posts');
        }
        
    };
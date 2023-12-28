<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('ht_tours', function (Blueprint $table) {
            $table->id();
            $table->string('code', 120)->unique();
            $table->text('name');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('more_content')->nullable();
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->text('images')->nullable();
            $table->string('tag', 120)->nullable();
            $table->foreignId('place_id')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('order')->unsigned()->default(0);
            $table->text('address')->nullable();
            $table->text('trip')->nullable();
            $table->text('duration')->nullable();
            $table->text('schedule')->nullable();
            $table->text('vehicle')->nullable();
            $table->text('departure_location')->nullable();
            $table->decimal('price', 15, 0)->nullable()->unsigned();
            $table->decimal('price_child', 15, 0)->nullable()->unsigned();
            $table->decimal('price_baby', 15, 0)->nullable()->unsigned();
            $table->longText('plan')->nullable();
            $table->longText('services_include')->nullable();
            $table->longText('services_exclude')->nullable();
            $table->longText('registration_conditions')->nullable();
            $table->longText('cancel_conditions')->nullable();
            $table->longText('checkout_description')->nullable();
            $table->timestamps();
        });

        Schema::create('ht_tours_features', function (Blueprint $table) {
            $table->foreignId('feature_id')->index();
            $table->foreignId('tour_id')->index();
            $table->timestamps();
            $table->primary(['feature_id', 'tour_id'], 'tours_features_primary');
        });

        Schema::create('ht_tours_testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id');
            $table->foreignId('testimonial_id');
            $table->tinyInteger('order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ht_tours_testimonials');
        Schema::dropIfExists('ht_tours_features');
        Schema::dropIfExists('ht_tours');
    }
};

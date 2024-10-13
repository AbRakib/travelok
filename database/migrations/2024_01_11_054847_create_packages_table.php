<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'packages', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' );
            $table->string( 'slug' )->unique();
            $table->unsignedBigInteger( 'user_id' );
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' );
            $table->text( 'details' );
            $table->unsignedBigInteger( 'country_id' );
            $table->unsignedBigInteger( 'division_id' );
            $table->unsignedBigInteger( 'district_id' );
            $table->date( 'start_date' );
            $table->date( 'end_date' );
            $table->integer( 'available_seat' )->default( 0 );
            $table->float( 'total_cost' );
            $table->string( 'image' );
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'packages' );
    }
    
    
};

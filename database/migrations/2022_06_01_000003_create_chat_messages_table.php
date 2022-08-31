<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('chat_conversations')->cascadeOnDelete();
            $table->foreignId('character_id')->nullable()->constrained('characters')->nullOnDelete();
            $table->longText('body');
            $table->enum('type', ['text', 'attachment'])->default('text');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('chat_conversations', function (Blueprint $table) {
            $table->foreignId('last_message_id')->nullable()->constrained('chat_messages')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
        Schema::table(
            'conversations',
            function (Blueprint $table) {
                $table->dropConstrainedForeignId('last_message_id');
            }
        );
    }
};

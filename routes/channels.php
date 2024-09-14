Broadcast::channel('chat.{roomId}', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
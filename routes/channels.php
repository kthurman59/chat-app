Broadcast::channel('chat.{roomId}', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('private-chat.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
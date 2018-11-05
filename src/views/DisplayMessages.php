<?php
function displayMessages()
{
    $messages = getMessages();
    $displayMsg = '';
    if ($messages) {
        $displayMsg = renderResponse(
            'message/message',
            array('messages' => $messages),
            'html',
            false
        );
        endMessage();
    }
    return $displayMsg;
}

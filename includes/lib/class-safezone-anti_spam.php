<?php

if (!class_exists('Safezone_Anti_Spam')) {
    class Safezone_Anti_Spam
    {
        public function comment_status_blocked($comment_ID, $comment_approved, $old_comment_approved)
        {
            if ( $comment_approved != $old_comment_approved ) {
                if ( 'spam' == $comment_approved ) { // Eğer yorum spam olarak işaretlenmişse
                    Safezone_Report::add("Spam comment blocked: $comment_ID", null, "Comment", "Anti-Spam", null, null);
                }
            }
        }
    }
}
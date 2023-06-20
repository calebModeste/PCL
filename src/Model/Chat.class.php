<?php 
namespace Run\Model;

class Chat{
    
    function getDiscusssion(int $user1, int $user2){
        $sql="SELECT
                chat.user1_id,
                chat.user2_id,
                chat.send_at
            FROM
                `chat`
            WHERE
                (chat.user1_id = ".$user1." AND chat.user2_id = ".$user2.") 
                OR 
                (chat.user1_id = ".$user2." AND chat.user2_id = ".$user1.")
            LIMIT 1";

        return htmlspecialchars($sql) ;
    }
    function getChat(int $user1, int $user2){
        $sql="SELECT
                chat.message_id,
                chat.user1_id as u1,
                chat.user2_id as u2,
                chat.message_user1 as mU1,
                chat.message_user2  as mU2,
                chat.send_at
            FROM
                chat
            WHERE
                (chat.user1_id =".$user1."  AND chat.user2_id = ".$user2.") 
                OR 
                (chat.user2_id =".$user1."  AND chat.user1_id = ".$user2.")";

        return htmlspecialchars($sql) ;
    }
    function setmessageU1($user1,$user2,$messageU1){
        $sql="INSERT INTO `chat`(
            `user1_id`,
            `user2_id`,
            `message_user2`
        )
        VALUES(".htmlspecialchars($user1).",".htmlspecialchars($user2).", '".htmlspecialchars($messageU1)."');";

        return $sql ;
    }
    function setmessageU2($user1,$user2,$messageU2){
        $sql="INSERT INTO `chat`(
            `user1_id`,
            `user2_id`,
            `message_user1`
        )
        VALUES(".htmlspecialchars($user1).",".htmlspecialchars($user2).", '".htmlspecialchars($messageU2)."');";

        return $sql ;
    }
}